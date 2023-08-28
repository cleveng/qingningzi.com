<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Cache;

class CommentsService extends BaseService
{

    public function replies(int $id)
    {
        return Comment::where('reply_id', $id)->take(10)->get();
    }
}
