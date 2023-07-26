<?php

namespace App\Http\Controllers\Home;

use App\Jobs\ProcessQrcode;
use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

        $anonicalURL = url('s/' . $data->shortcode);
        SEOMeta::setTitle($data->title);
        SEOMeta::addKeyword($data->keywords);
        SEOMeta::setDescription($data->description);
        SEOMeta::setCanonical($anonicalURL);

        // 处理二维码
        if (!$data->qrcode) {
            try {
                $resp = Http::post(env('API_QRCODE_URL'), [
                    'content' => $anonicalURL,
                ]);
                $result = $resp->json();
                ProcessQrcode::dispatch($data, $result["file_url"])->delay(now()->addMinute())->onQueue('qrcode');
            } catch (\Illuminate\Http\Client\RequestException $e) {
                Log::error("[Articles] RequestException error: " . $e->getMessage());
            } catch (\Exception $e) {
                Log::error("[Articles] Exception error: " . $e->getMessage());
            }
        }

        $data->increment('views_count');
        $parentId = $data->category->parent_id === 0 ? $data->category->id : $data->category->parent_id;
        return view('pages.articles.id', [
            'data' => $data,
            'category' => $data->category,
            'parent_id' => $parentId,
            'url' => $anonicalURL,
        ]);
    }
}
