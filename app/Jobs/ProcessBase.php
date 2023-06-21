<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class ProcessBase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $dir_name;
    protected $fileURL;
    protected $record;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 需要设置 uploadfile 可读可写
        $this->dir_name = "uploadfile/qrcodes";
        $dir_path = public_path($this->dir_name);
        if (!File::exists($dir_path)) {
            File::makeDirectory($dir_path, 0755, true, true);
        }
    }
}
