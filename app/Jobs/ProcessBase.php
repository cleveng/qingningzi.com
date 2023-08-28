<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;

class ProcessBase implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected string $file_url;
    protected Article $article;

    protected string $dir;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->dir = 'uploadfile/qrcodes';

        // 需要设置 uploadfile 可读可写
        $path = public_path($this->dir);
        if (!File::exists($path)) {
            $isOK = File::makeDirectory($path, 0755, true, true);
            if (!$isOK) {
                \Log::error('创建目录失败，请检查 uploadfile 是否有可写的权限!!!');
            }
        }
    }
}
