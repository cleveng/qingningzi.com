<?php

namespace App\Http\Controllers\Home;

use App\Enums\FileType;
use App\Jobs\ProcessQrcode;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostsController extends BaseController
{
    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function show(Request $request, $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = Post::where('shortcode', $id)->first();
        if (!$data) {
            abort(404);
        }

        // update tags views_count
        $tags = $data->tags()->pluck('name');
        $data->tags()->increment('views_count');

        // FIXME: the browser not support .swf video, file_url
        // 2023/08/13 17:45:00 PM
        if ($data->file_type === FileType::LINK && Str::contains($data->file_url, ".swf")) {
            $data->file_url = "https://www.baidu.com/s?wd=" . urlencode($data->title);
            $data->save();
        }

        SEOMeta::setTitle($data->title);
        SEOMeta::addKeyword($data->keywords);
        SEOMeta::setDescription($data->description);
        SEOMeta::setCanonical(url($data->shortcode));

        // 处理二维码
        if (!$data->qrcode) {
            try {
                $resp = Http::post(env('API_QRCODE_URL'), [
                    'content' => url($data->shortcode),
                ]);
                $result = $resp->json();
                ProcessQrcode::dispatch($data, $result["data"])->delay(now()->addMinute())->onQueue('qrcode');
            } catch (\Illuminate\Http\Client\RequestException $e) {
                Log::error("[Posts] RequestException error: " . $e->getMessage());
            } catch (\Exception $e) {
                Log::error("[Posts] Exception error: " . $e->getMessage());
            }
        }

        $data->increment('views_count');
        $parentId = $data->category->parent_id === 0 ? $data->category->id : $data->category->parent_id;

        // get previous and next records
        $previous = Cache::remember('previous_post_' . $data->shortcode, $this->duration, function () use ($data) {
            return Post::where('id', '<', $data->id)->orderBy('id', 'desc')->first();
        });
        $next = Cache::remember('next_post_' . $data->shortcode, $this->duration, function () use ($data) {
            return Post::where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        });

        return view('pages.posts.id', [
            'data' => $data,
            'category' => $data->category,
            'parent_id' => $parentId,
            'tags' => $tags,
            'previous' => $previous,
            'next' => $next,
        ]);
    }
}
