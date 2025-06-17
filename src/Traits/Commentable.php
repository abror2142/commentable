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
        $comment->approved = true;
        $comment->save();
        return $comment;
    }

    public function disapproveComment(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->approved = false;
        $comment->save();
        return $comment;
    }

    public function makeCommentHidden(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->visible = false;
        $comment->save();
        return $comment;
    }

    public function makeCommentVisible(int $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->visible = true;
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