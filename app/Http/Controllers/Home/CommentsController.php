<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\Home\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends BaseController
{
    protected Article $article;

    public function __construct(Article $article)
    {
        parent::__construct();
        $this->article = $article;
    }

    public function store(CommentRequest $request)
    {
        $data = $request->except(['_token', 'site']);
        $data['article_id'] = intval($data['article_id']);
        $data['user_id'] = auth()->user()->id;

        if (!Comment::create($data)) {
            return Redirect::back()->withErrors(['message' => '评论失败!!!']);
        }

        $record = $this->article::find($data['article_id']);
        $record->increment('comments_count');

        return Redirect::back()->with(['message' => '评论成功!!!']);
    }
}
