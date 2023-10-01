<?php

declare(strict_types=1);

namespace Domain\Blogging\Factories;

use Domain\Blogging\ValueObjects\PostValueObject;
use Domain\Blogging\Models\Post;

class PostFactory
{
    public static function createToStorePost(array $attributes) : PostValueObject
    {
        return new PostValueObject(
            title: $attributes['title'],
            body: $attributes['body'],
            description: $attributes['description']
        );
    }

    public static function createToUpdatePost(array $attributes, Post $post) : PostValueObject
    {
        return new PostValueObject(
            title: $attributes['title'] ?? $post->title,
            body: $attributes['body'] ?? $post->body,
            description: $attributes['description'] ?? $post->description
        );
    } 
}