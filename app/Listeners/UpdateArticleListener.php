<?php

namespace App\Listeners;

use App\Events\UpdateArticle;
use App\Jobs\ProcessQrcode;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UpdateArticleListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\UpdateArticle $event
     * @return void
     */
    public function handle(UpdateArticle $event)
    {
        $article = $event->article;
        // if rate is 0, random a value
        if ($article->rate === 0) {
            $article->rate = random_int(1, 5);
        }
        $article->increment('views_count');
        $article->increment('hit_count');

        // 处理二维码
        if (!$article->qrcode) {
            try {
                $resp = Http::post(env('API_QRCODE_URL'), [
                    'content' => url($article->shortcode),
                ]);
                $result = $resp->json();
                ProcessQrcode::dispatch($article, $result["data"])->delay(now()->addMinute())->onQueue('qrcode');
            } catch (\Illuminate\Http\Client\RequestException $e) {
                Log::error("[Articles] RequestException error: " . $e->getMessage());
            } catch (\Exception $e) {
                Log::error("[Articles] Exception error: " . $e->getMessage());
            }
        }

        $article->save();
    }
}
