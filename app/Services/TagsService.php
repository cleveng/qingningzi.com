<?php

namespace App\Services;


use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class TagsService extends BaseService
{

    public function tags()
    {
        return [];
    }

    public function keywords(string $keywords, string $url): array
    {
        return Cache::remember($url, $this->duration, function () use ($keywords) {
            return explode(',', $keywords);
        });
    }
}
