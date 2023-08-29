<?php

namespace App\Listeners;

use App\Events\UpdateTag;

class UpdateTagListener
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
     * @param  \App\Events\UpdateTag  $event
     * @return void
     */
    public function handle(UpdateTag $event)
    {
        $article = $event->article;
        $article->tags()->increment('views_count');
    }
}
