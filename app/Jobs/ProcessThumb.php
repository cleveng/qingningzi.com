<?php

namespace App\Jobs;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use Vinkla\Hashids\Facades\Hashids;

/**
 *
 */
class ProcessThumb extends ProcessBase
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($record, $fileURL)
    {
        parent::__construct();

        $this->record = $record;
        $this->fileURL = $fileURL;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $record = $this->record;

        try {
            $response = Http::get($this->fileURL);

            // 获取响应状态码
            $statusCode = $response->status();
            if ($statusCode !== 200) {
                Log::error("Failed to download image ");
                return;
            }

            // 图片下载成功，保存图片到本地
            $shortcode = Hashids::encode($record->id);
            $filename = $this->dir_thumb . '/' . $shortcode . '.jpg';
            $filepath = public_path($filename);

            // 保存图片数据到本地文件
            if (file_put_contents($filepath, $response->body())) {
                $record->thumb = $filename;
                $record->save();
            }
        } catch (Exception $e) {
            Log::error("An error occurred: " . $e->getMessage());
        }
    }
}
