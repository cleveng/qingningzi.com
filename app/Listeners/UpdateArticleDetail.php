<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateArticleDetail implements ShouldQueue
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
        if ($article->hit_count > 0) {
            return;
        }

        $detail = $article->detail;
        $limit = ['<p></p>', '<p>图片来自网络</p>'];
        foreach ($limit as $value) {
            $detail->content = str_replace($value, '', $detail->content);
        }

        $detail->content = preg_replace('/<!--(.*?)-->/', '', $detail->content);
        $detail->content = trim($detail->content);
        $detail->save();

        $article->increment('hit_count');
    }
}
