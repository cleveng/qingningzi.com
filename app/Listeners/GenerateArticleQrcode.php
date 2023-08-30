<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use App\Jobs\ProcessQrcode;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GenerateArticleQrcode implements ShouldQueue
{
    use InteractsWithQueue;

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
     * @param App\Events\ArticleViewed $event
     * @return void
     */
    public function handle(ArticleViewed $event)
    {
        $article = $event->article;
        if ($article->qrcode) {
            return;
        }

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
}
