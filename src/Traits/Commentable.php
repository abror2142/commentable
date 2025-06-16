<?php

namespace Abrorbekismoilov\Commentable\Traits;

use Abrorbekismoilov\Commentable\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function addComment(string $body): Comment
    {
        return $this->comments()->create([
            'body' => $body,
        ]);
    }
}