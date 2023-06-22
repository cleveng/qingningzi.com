<?php

namespace App\Http\Controllers\Home;

use App\Enums\ContentType;
use App\Models\Article;
use App\Models\Category;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class CategoriesController extends BaseController
{

    public function index(Request $request)
    {
        return redirect('/', 301);
    }

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

        $url_prefix = "s/";
        $cid = $category->parent_id === 0 ? $category->children()->pluck('id')->toArray() : [$category->id];
        if ($category->content_type === ContentType::ARTICLE) {
            $data = Article::whereIn('category_id', $cid)->orderBy('order', 'desc')->paginate();
        } else {
            $data = Post::whereIn('category_id', $cid)->orderBy('created_at', 'desc')->paginate();
            $url_prefix = "p/";
        }

        return view('pages.categories.index', [
            'data' => $data,
            'category' => $category,
            'url' => $category->url,
            'url_prefix' => $url_prefix,
            'parent_id' => $category->parent_id,
        ]);
    }
}
