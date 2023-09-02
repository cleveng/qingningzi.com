<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class ArticlesService extends BaseService
{

    public function rates($url, $rate)
    {
        $max = ($rate > 5) ? 5 : $rate;
        return Cache::remember($url . $rate, $this->duration, function () use ($max) {
            $result = str_repeat("<i class='ci-star-filled'></i>", $max);
            $result .= str_repeat("<i class='ci-star'></i>", 5 - $max);
            return $result;
        });
    }

    public function item($id)
    {
        $category = Category::find($id);
        return Cache::remember('item_' . $category->url, $this->duration, function () use ($category) {
            return Article::where('category_id', $category->id)->where('status', true)->inRandomOrder()->first();
        });
    }

    public function items($id, $len)
    {
        $category = Category::find($id);
        $direction = $len <= 4 ? 'asc' : 'desc';
        return Cache::remember($category->url . $len, $this->duration, function () use ($category, $len, $direction) {
            return Article::where('category_id', $category->id)->where('status', true)->orderBy('created_at', $direction)->take($len)->get();
        });
    }

    public function find(int $id)
    {
        return Cache::remember('find_' . $id, $this->duration, function () use ($id) {
            return Article::where('status', true)->find($id);
        });
    }

    public function count(bool $status = true)
    {
        return Cache::remember('count_' . $status, 600, function () use ($status) {
            return Article::where('status', $status)->count();
        });
    }

    public function popular(int $taggable_id, int $len = 3)
    {
        return Article::where('id','<>', $taggable_id)->where('status', true)->inRandomOrder()->take($len)->get();
    }
}
