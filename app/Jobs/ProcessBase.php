<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class ProcessBase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $fileURL;
    protected $record;

    protected $now;

    protected $dir_qrcode;
    protected $dir_thumb;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->now = Carbon::now();

        $this->dir_qrcode = "uploadfile/qrcodes";
        $this->dir_thumb = "uploadfile/" . $this->now->format('Y/md');

        $dirs = [
            $this->dir_qrcode,
            $this->dir_thumb,
            'uploadfile/' . $this->now->format('Y'),
        ];

        // 需要设置 uploadfile 可读可写
        for ($i = 0; $i < count($dirs); $i++) {
            $dir_path = public_path($dirs[$i]);
            if (!File::exists($dir_path)) {
                $isOK = File::makeDirectory($dir_path, 0755, true, true);
                if (!$isOK) {
                    \Log::error("创建目录失败，请检查 uploadfile 是否有可写的权限!!!");
                }
            }
        }
    }
}
