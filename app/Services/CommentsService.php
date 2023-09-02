<?php

namespace App\Services;

use App\Models\Comment;

class CommentsService extends BaseService
{

    public function replies(int $id)
    {
        return Comment::where('reply_id', $id)->take(10)->get();
    }
}
