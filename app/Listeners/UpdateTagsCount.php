<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateTagsCount implements ShouldQueue
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
        $tags = $article->tags();
        if ($tags->count() === 0) {
            return;
        }
        if (!$article->keywords) {
            $article->keywords = $tags->pluck('name')->join(',');
            $article->save();
        }

        $tags->increment('views_count');
    }
}
