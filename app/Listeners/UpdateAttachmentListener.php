<?php

namespace App\Listeners;

use App\Enums\FileType;
use App\Events\UpdateAttachment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdateAttachmentListener
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
     * @param \App\Events\UpdateAttachment $event
     * @return void
     */
    public function handle(UpdateAttachment $event)
    {
        $attachment = $event->attachment;
        if (!$attachment) {
            return;
        }

        if ($attachment->file_type === FileType::LINK && Str::contains($attachment->file_url, ".swf")) {
            $attachment->file_url = 'https://www.baidu.com/s?wd=' . urlencode($event->title);
            $attachment->save();
        }
    }
}
