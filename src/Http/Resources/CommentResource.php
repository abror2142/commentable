<?php

namespace Abrorbekismoilov\Commentable\Http\Resources;

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
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
            'replies' => CommentResource::collection($this->whenLoaded('replies'))
        ];
    }
}