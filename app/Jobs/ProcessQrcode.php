<?php

namespace App\Jobs;

use Illuminate\Support\Str;

class ProcessQrcode extends ProcessBase
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
        // TODO: record是一个泛型啊
        $record = $this->record;

        // 多余的空白字符串
        $search = "<p>&nbsp;</p>\r\n";
        if (Str::contains($record->content, $search)) {
            $record->content = Str::replace($search, "", $record->content);
        }

        // 处理图片内容
        $filename = $this->dir_name . '/' . $record->shortcode . '.png';
        $filepath = public_path($filename);
        if (file_put_contents($filepath, file_get_contents($this->fileURL))) {
            $record->qrcode = $filename;
        }

        $record->save();
    }
}
