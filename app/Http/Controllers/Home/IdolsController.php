<?php

namespace App\Http\Controllers\Home;

use App\Enums\ContentType;
use App\Models\Category;
use App\Models\Idol;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IdolsController extends BaseController
{
    /**
     * @param Request $request
     * @return Factory|View|Application
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::where('content_type', ContentType::IDOL)->first();
        if (!$category) {
            abort(404);
        }

        SEOMeta::setTitle($category->title);
        SEOMeta::addKeyword($category->keywords);
        SEOMeta::setDescription($category->description);
        SEOMeta::setCanonical(url($category->url));

        $data = Idol::where('status', true)->orderBy('id', 'desc')->paginate();
        return view($this->tmpl.'idols.index', [
            'data' => $data,
            'category' => $category,
            'parent_id' => $category->parent_id,
        ]);
    }
}
