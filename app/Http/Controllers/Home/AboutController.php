<?php

namespace App\Http\Controllers\Home;

use App\Enums\ContentType;
use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::where('content_type', ContentType::DEFAULT)->first();

        SEOMeta::setTitle($category->title);
        SEOMeta::addKeyword($category->keywords);
        SEOMeta::setDescription($category->description);
        SEOMeta::setCanonical(url($category->url));

        return view('pages.about.index', [
            'data' => [],
            'category' => $category,
            'url' => $category->url,
            'parent_id' => $category->parent_id,
        ]);
    }
}
