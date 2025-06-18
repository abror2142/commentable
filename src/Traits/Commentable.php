<?php

namespace Abrorbekismoilov\Commentable\Traits;

use Abrorbekismoilov\Commentable\Models\Comment;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function addComment(string $body, ?int $userId = null, ?int $parentId = null)
    {
        # This if statement ensures that only one level comments are allowed.
        # !! To enable multi-level comments, comment/delete this if statement.
        if($parentId !== null) {
            $parent = $this->comments()->findOrFail($parentId);
            if($parent->parent_id !== null) {
                throw new \Exception("Only 1 level comments are allowed!");
            }
        }

        return $this->comments()->create([
            'body' => $body,
            'user_id' => $userId,
            'parent_id' => $parentId
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