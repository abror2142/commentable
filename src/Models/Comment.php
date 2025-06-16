<?php

namespace Abrorbekismoilov\Commentable\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['commentable_id', 'commentable_type', 'body', 'user_id'];

    public function commentable() {
        return $this->morphTo();
    }

}
