<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\V1\UserResource;

class PostResource extends JsonResource
{
    public function toArray($request) : array
    {
        return [
            'id' => $this->key,
            'type' => 'posts',
            'attributes' => [
                'title' => $this->title,
                'body' => $this->body,
                'description' => $this->description,
                'published' => $this->published,
            ],
            'relationships' => [
                'user' => new UserResource($this->whenLoaded('user'))
            ],
            'links' => [
                'self' => route('api:v1:posts:show', $this->key),
                'parent' => route('api:v1:posts:index')
            ]
        ];
    }
}
