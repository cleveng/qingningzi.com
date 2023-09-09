<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;

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

        // NOTE: key has a prefix likes _database_,
        // see the config /configs/database.php => REDIS_PREFIX
        foreach (Redis::smembers(env('DETAIL_EXCEPT_WORDS')) as $value) {
            $detail->content = str_replace($value, '', $detail->content);
        }

        $detail->content = preg_replace('/<!--(.*?)-->/', '', $detail->content);
        $detail->content = trim($detail->content);
        $detail->save();

        $article->increment('hit_count');
    }
}
