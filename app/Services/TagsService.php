<?php

namespace App\Services;


use App\Models\Article;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Facades\Cache;

class TagsService extends BaseService
{

    /**
     * @return mixed
     */
    public function tags()
    {
        return Tag::inRandomOrder()->take(15)->get()->unique('taggable_id');
    }

    /**
     * @return mixed
     */
    public function random(string $url = '')
    {
        return Cache::remember('random_'.$url, $this->duration, function () {
            return Tag::inRandomOrder()->take(30)->get()->unique('taggable_id');
        });
    }

    public function popular(string $url = '', string $except = '')
    {
        return Cache::remember('popular_'.$url, $this->duration, function () use ($except) {
            return Tag::where('name', '<>', $except)->orderBy('hit_count', 'desc')->take(5)->get()->unique('taggable_id');
        });
    }

    /**
     * @param string $url
     * @param int $number
     * @return mixed
     */
    public function lastest(string $url = '', int $number = 3)
    {
        return Cache::remember('lastest_'.$url, $this->duration, function () use ($number) {
            return Tag::whereHasMorph("taggable", [Post::class, Article::class])->inRandomOrder()->take($number)->get()->unique('taggable_id');
        });
    }

    public function keywords(string $keywords, string $url): array
    {
        return Cache::remember($url, $this->duration, function () use ($keywords) {
            return explode(',', $keywords);
        });
    }
}
