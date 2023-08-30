<?php

namespace App\Listeners;

use App\Enums\FileType;
use App\Events\ArticleViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdateAttachmentURL implements ShouldQueue
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
        $attachment = $event->article->attachment;
        if (!$attachment) {
            return;
        }

        if ($attachment->file_type === FileType::LINK && Str::contains($attachment->file_url, ".swf")) {
            $attachment->file_url = 'https://www.baidu.com/s?wd=' . urlencode($event->article->title);
            $attachment->save();
        }
    }
}
