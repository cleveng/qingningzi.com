<?php

namespace App\Http\Controllers\Home;

use App\Jobs\ProcessQrcode;
use App\Models\Article;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
                ProcessQrcode::dispatch($data, $result["file_url"])->delay(now()->addMinute())->onQueue('qrcode');
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
