<?php

namespace App\Http\Controllers\Home;

use App\Enums\ContentType;
use App\Enums\FileType;
use App\Models\Article;
use App\Models\Category;
use App\Models\Idol;
use App\Models\Platform;
use App\Models\PositionData;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Vinkla\Hashids\Facades\Hashids;

class CategoriesController extends BaseController
{
    public function index(Request $request)
    {
        set_time_limit(0);

        $data = PositionData::first();
        dd(json_decode($data->data, true));
        dd("updated success");

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
            return redirect(url('/idols'), 301);
        }

        if ($category->content_type === ContentType::DEFAULT) {
            return redirect('about', 301);
        }

        // 设置SEO
        SEOMeta::setTitle($category->title);
        SEOMeta::addKeyword($category->keywords);
        SEOMeta::setDescription($category->description);
        SEOMeta::setCanonical(url($category->url));

        $cid = $category->parent_id === 0 ? $category->children()->pluck('id')->toArray() : [$category->id];
        if ($category->content_type === ContentType::ARTICLE) {
            $data = Article::whereIn('category_id', $cid)->orderBy('order', 'desc')->paginate();
            $template = 'pages.categories.article';
        } else {
            $data = Post::whereIn('category_id', $cid)->orderBy('created_at', 'desc')->paginate();
            $template = 'pages.categories.post';
        }

        return view($template, [
            'data' => $data,
            'category' => $category,
            'url' => $category->url,
            'parent_id' => $category->parent_id,
        ]);
    }
}
