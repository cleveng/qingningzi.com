<?php

namespace App\Http\Controllers\Home;

use App\Enums\ContentType;
use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CategoriesController extends BaseController
{

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function index(Request $request): Redirector|RedirectResponse|Application
    {
        return redirect('/', 301);
    }

    /**
     * @param Request $request
     * @param $id
     * @return View|Factory|Redirector|RedirectResponse|Application
     */
    public function show(Request $request, $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);
        if (!$category) {
            abort(404);
        }

        // 免责声明
        if ($category->content_type === ContentType::IDOL) {
            return redirect($this->idolURL);
        }

        if ($category->content_type === ContentType::DEFAULT) {
            return redirect($this->aboutURL);
        }

        // 设置SEO
        SEOMeta::setTitle($category->title);
        SEOMeta::addKeyword($category->keywords);
        SEOMeta::setDescription($category->description);
        SEOMeta::setCanonical(url($category->url));

        $cid = $category->parent_id === 0 ? $category->children()->pluck('id')->toArray() : [$category->id];
        if ($category->content_type === ContentType::ARTICLE) {
            $data = Article::whereIn('category_id', $cid)->orderBy('updated_at', 'desc')->paginate();
        } else {
            $data = Post::whereIn('category_id', $cid)->orderBy('created_at', 'desc')->paginate();
        }

        // level 1 category parent_id is itself
        $parent_id = $category->parent_id === 0 ? $category->id : $category->parent_id;

        return view('pages.categories.index', [
            'data' => $data,
            'category' => $category,
            'url' => $category->url,
            'parent_id' => $parent_id,
        ]);
    }
}
