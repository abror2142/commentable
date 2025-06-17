<?php

namespace Abrorbekismoilov\Commentable\Traits;

use Abrorbekismoilov\Commentable\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function addComment(string $body, ?int $userId = null): Comment
    {
        return $this->comments()->create([
            'body' => $body,
            'user_id' => $userId
        ]);
    }

    public function approveComment(int $commentId) 
    {
        $comment = Comment::findOrFail($commentId);
        $comment->is_approved = true;
        $comment->save();
        return $comment;
    }

    public function disapproveComment(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->is_approved = false;
        $comment->save();
        return $comment;
    }

    public function hideComment(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->is_hidden = true;
        $comment->save();
        return $comment;
    }

    public function unhideComment(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->is_hidden = false;
        $comment->save();
        return $comment;
    }

    public function deleteComment(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();
        return;
    }
}