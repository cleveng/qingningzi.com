<?php

namespace App\Http\Controllers\Home;

use App\Enums\FileType;
use App\Jobs\ProcessQrcode;
use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @Controller: ArticlesController
 */
class ArticlesController extends BaseController
{
    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function show(Request $request, $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = Article::where('shortcode', $id)->first();
        if (!$data) {
            abort(404);
        }

        // update tags views_count
        $tags = $data->tags()->pluck('name');
        $data->tags()->increment('views_count');

        // FIXME: the browser not support .swf video, file_url
        $attachment = $data->attachment;
        if ($attachment && $attachment->file_type === FileType::LINK && Str::contains($attachment->file_url, ".swf")) {
            $attachment->file_url = "https://www.baidu.com/s?wd=" . urlencode($data->title);
            $attachment->save();
        }

        // seo
        SEOMeta::setTitle($data->title);
        SEOMeta::addKeyword($tags->join(','));
        SEOMeta::setDescription($data->description);
        SEOMeta::setCanonical($request->getRequestUri());

        // 处理二维码
        if (!$data->qrcode) {
            try {
                $resp = Http::post(env('API_QRCODE_URL'), [
                    'content' => url($data->shortcode),
                ]);
                $result = $resp->json();
                ProcessQrcode::dispatch($data, $result["data"])->delay(now()->addMinute())->onQueue('qrcode');
            } catch (\Illuminate\Http\Client\RequestException $e) {
                Log::error("[Articles] RequestException error: " . $e->getMessage());
            } catch (\Exception $e) {
                Log::error("[Articles] Exception error: " . $e->getMessage());
            }
        }

        $data->increment('views_count');
        $data->increment('hit_count');
        $parentId = $data->category->parent_id === 0 ? $data->category->id : $data->category->parent_id;

        // get previous and next records
        $previous = Cache::remember('previous_article_' . $data->shortcode, $this->duration, function () use ($data) {
            return Article::where('id', '<', $data->id)->orderBy('id', 'desc')->first();
        });
        $next = Cache::remember('next_article_' . $data->shortcode, $this->duration, function () use ($data) {
            return Article::where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        });

        return view('pages.articles.id', [
            'data' => $data,
            'category' => $data->category,
            'parent_id' => $parentId,
            'tags' => $tags,
            'previous' => $previous,
            'next' => $next,
            'attachment' => $attachment,
        ]);
    }
}
