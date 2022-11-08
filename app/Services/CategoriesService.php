<?php

namespace App\Services;


use App\Enums\ContentType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CategoriesService extends BaseService
{

    protected Collection $parents;
    protected array $fields;

    public function __construct()
    {
        parent::__construct();
        $this->parents = Category::where('status', true)->where('parent_id', 0)->get();;
    }

    public function parents(): Collection|array|\Illuminate\Support\Collection
    {
        return $this->parents;
    }

    public function about()
    {
        return Cache::remember('content_type_' . ContentType::DEFAULT, $this->duration, function () {
            return Category::where('content_type', ContentType::DEFAULT)->first();
        });
    }

    public function submenu()
    {
        return Cache::remember('categories_submenu', $this->duration, function () {
            return Category::whereIn('id', [13, 16, 28, 30])->get();
        });
    }


}
