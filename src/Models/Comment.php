<?php

namespace Abrorbekismoilov\Commentable\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['commentable_id', 'commentable_type', 'body', 'user_id', 'is_approved', 'is_hidden', 'parent_id', 'thread_id'];

    public function commentable() {
        return $this->morphTo();
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    public function replies() 
    {
        return $this->hasMany(Comment::class, 'thread_id');
    }

    public function thread() 
    {
        return $this->belongsTo(Comment::class, 'thread_id');
    }

    public function user() 
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

}
