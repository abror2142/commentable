<?php

namespace Abrorbekismoilov\Commentable\Http\Resources;

use Abrorbekismoilov\Commentable\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource 
{
    public function toArray($request) 
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'user_id' => $this->user_id,
            'is_approved' => $this->is_approved,
            'is_hidden' => $this->is_hidden,
            'thread_id' => $this->thread_id,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
            'replies' => CommentResource::collection($this->whenLoaded('replies')),
            'user' => UserResource::make($this->whenLoaded('user'))
        ];
    }
}