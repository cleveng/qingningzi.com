<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class MenuService extends BaseService
{
    public function navs(): array
    {

        $parents = Category::where('parent_id', 0)
            ->where('child', 1)
            ->where('ismenu', 1)
            ->orderBy('catid', 'asc')
            ->take(5)->select(['catid', 'catname', 'arrchildid', 'child', 'ismenu'])->get()->toArray();

        foreach ($parents as $key => $parent) {
            $ids = explode(",", $parent['arrchildid']);
            if (in_array($parent['catid'], $ids)) {
                $k = array_search($parent['catid'], $ids);
                unset($ids[$k]);
            }
            $parents[$key]['children'] = Category::whereIn('catid', $ids)
                ->orderBy('catid', 'asc')
                ->select(['catid', 'catname', 'arrchildid', 'child', 'ismenu'])
                ->get()->toArray();

        }
        return $parents;
    }

    public function menus()
    {
        return Cache::remember('menus_all', $this->expiredAt, function () {
            return Category::where('parent_id', 0)
                ->where('status', 1)
                ->take(5)->get();
        });
    }


    public function email()
    {
        return Cache::remember('email_menu_', $this->expiredAt, function () {
            return [
                [
                    'url' => url($this->categoryURL.'/13'),
                    'title' => '青柠快讯'
                ],
                [
                    'url' => url($this->categoryURL.'/16'),
                    'title' => '单身汪'
                ],
                [
                    'url' => url($this->categoryURL.'/28'),
                    'title' => '图片'
                ],
                [
                    'url' => url($this->categoryURL.'/30'),
                    'title' => '电子书'
                ]
            ];
        });
    }
}
