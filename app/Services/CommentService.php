<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function create(int $article_id, string $subject, string $body): Comment
    {
        return Comment::create([
            'article_id' => $article_id,
            'subject' => $subject,
            'body' => $body,
        ]);
    }
}
