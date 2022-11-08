<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class PostsController extends BaseController
{
    public function show(Request $request, $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = Post::where('shortcode', $id)->first();
        if (!$data) {
            abort(404);
        }

        SEOMeta::setTitle($data->title);
        SEOMeta::addKeyword($data->keywords);
        SEOMeta::setDescription($data->description);
        SEOMeta::setCanonical(url('p/' . $data->shortcode));

        $data->increment('views_count');
        $parentId = $data->category->parent_id === 0 ? $data->category->id : $data->category->parent_id;
        return view('pages.posts.id', [
            'data' => $data,
            'category' => $data->category,
            'parent_id' => $parentId,
            'url' => 'p/' . $data->shortcode,
        ]);
    }
}
