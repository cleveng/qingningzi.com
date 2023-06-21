<?php

namespace App\Services;


use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class TagsService extends BaseService
{

    public function tags()
    {
//        $videos = Video::inRandomOrder()->take(10)->select(['keywords'])->get()->toArray();
        $result = [];
//        foreach ($videos as $k => $v) {
//            $keywords = explode(",", $v['keywords']);
//            $result = array_merge($result, $keywords);
//        }
        return array_unique($result);
    }

    public function keywords(string $keywords, string $url): array
    {
        return Cache::remember($url, $this->duration, function () use ($keywords) {
            return explode(',', $keywords);
        });
    }
}
