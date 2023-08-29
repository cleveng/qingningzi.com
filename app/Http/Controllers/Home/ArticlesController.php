<?php

namespace App\Http\Controllers\Home;

use App\Events\UpdateArticle;
use App\Events\UpdateAttachment;
use App\Events\UpdateTag;
use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @Controller: ArticlesController
 */
class ArticlesController extends BaseController
{
    /**
     * @param Request $request
     * @param $id
     * @return Factory|View|Application
     */
    public function show(Request $request, $id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data = Article::where('shortcode', $id)->first();
        if (!$data) {
            abort(404);
        }

        // update tags views_count
        $keywords = $request->input('site')->keywords;
        $tags = $data->tags()->pluck('name');
        if (count($tags) > 0) {
            UpdateTag::dispatch($data);
            $keywords = $tags->join(',');
        }

        $attachment = $data->attachment;
        if ($attachment) {
            UpdateAttachment::dispatch($attachment, $data->title);
        }

        // seo
        SEOMeta::setTitle($data->title);
        SEOMeta::addKeyword($keywords);
        SEOMeta::setDescription($data->description);
        SEOMeta::setCanonical($request->getRequestUri());

        UpdateArticle::dispatch($data);
        $parentId = $data->category->parent_id === 0 ? $data->category->id : $data->category->parent_id;

        // get previous and next records
        $previous = Cache::remember('previous_article_' . $data->shortcode, $this->duration, function () use ($data) {
            return Article::where('id', '<', $data->id)->orderBy('id', 'desc')->first();
        });
        $next = Cache::remember('next_article_' . $data->shortcode, $this->duration, function () use ($data) {
            return Article::where('id', '>', $data->id)->orderBy('id', 'asc')->first();
        });

        // comments
        $comments = $data->comments()->paginate();
        return view('pages.articles.id', [
            'data' => $data,
            'category' => $data->category,
            'parent_id' => $parentId,
            'tags' => $tags,
            'previous' => $previous,
            'next' => $next,
            'attachment' => $attachment,
            'comments' => $comments,
        ]);
    }
}
