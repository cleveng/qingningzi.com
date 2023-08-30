<?php

namespace App\Listeners;

use App\Events\UpdateDetail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdateDetailListener
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
     * @param  \App\Events\UpdateDetail  $event
     * @return void
     */
    public function handle(UpdateDetail $event)
    {
        $detail = $event->detail;
        if (!Str::contains($detail->content, '<p></p>')) {
            return;
        }

        $detail->content = str_replace('<p></p>', '', $detail->content);
        $detail->save();
    }
}
