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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Article $article, string $file_url)
    {
        parent::__construct();
        $this->article = $article;
        $this->file_url = $file_url;
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
            $response = Http::get($this->file_url);

            // 获取响应状态码
            $statusCode = $response->status();
            if ($statusCode !== 200) {
                Log::error('Failed to download image ');
                return;
            }

            // 图片下载成功，保存图片到本地
            $filename = $this->dir . '/' . basename($this->file_url);
            $filepath = public_path($filename);

            // 保存图片数据到本地文件
            if (file_put_contents($filepath, $response->body())) {
                $article->qrcode = $filename;
                $article->save();
            }
        } catch (Exception $e) {
            Log::error('An error occurred: ' . $e->getMessage());
        }
    }
}
