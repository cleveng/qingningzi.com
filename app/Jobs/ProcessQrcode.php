<?php

namespace App\Jobs;

use App\Models\Article;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 *
 */
class ProcessQrcode extends ProcessBase
{
    protected Article $article;
    private string $target;
    private string $filename;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        parent::__construct();
        $this->article = $article;
        $this->target = 'https://api.pwmqr.com/qrcode/create/?url=' . urlencode(url($article->shortcode));
        $this->filename = basename($article->shortcode) . '.jpeg';
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $article = $this->article;
        try {
            $resp = Http::get($this->target);
            if ($resp->status() !== 200) {
                Log::error('Failed to download image ');
                return;
            }

            // 图片下载成功，保存图片到本地
            $filename = $this->dir . '/' . $this->filename;
            $filepath = public_path($filename);

            // 保存图片数据到本地文件
            if (file_put_contents($filepath, $resp->body())) {
                $article->qrcode = $filename;
                $article->save();
            }
        } catch (Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }
}
