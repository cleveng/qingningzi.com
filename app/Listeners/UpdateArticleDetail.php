<?php

namespace App\Listeners;

use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UpdateArticleDetail implements ShouldQueue
{
    use InteractsWithQueue;

    private int $stopValue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->stopValue = 666;
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
        // FIXME: NEXT VERSION DEAL IT
        if ($article->hit_count === $this->stopValue) {
            return;
        }

        $detail = $article->detail;

        // NOTE: key has a prefix likes _database_,
        // see the config /configs/database.php => REDIS_PREFIX
        foreach (Redis::smembers(env('DETAIL_EXCEPT_WORDS')) as $value) {
            $detail->content = str_replace($value, '', $detail->content);
        }

        // remove all link and replaced it with text
        if (Str::contains($detail->content, '<a')) {
            $detail->content = preg_replace('/<a[^>]*>(.*?)<\/a>/', '<b>$1</b>', $detail->content);
        }
        $detail->content = preg_replace('/<!--(.*?)-->/', '', $detail->content);
        $detail->content = trim($detail->content);
        $detail->save();

        $article->increment('hit_count');
    }
}
