<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateArticleCount implements ShouldQueue
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
        $article->increment('views_count');
        $article->hit_count > 0 && $article->increment('hit_count');

        if ($article->rate === 0) {
            $article->rate = random_int(1, 5);
            $article->save();
        }
    }
}
