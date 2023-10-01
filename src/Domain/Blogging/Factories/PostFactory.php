<?php

declare(strict_types=1);

namespace Domain\Blogging\Factories;

use Domain\Blogging\ValueObjects\PostValueObject;

class PostFactory
{
    public static function create(array $attributes) : PostValueObject
    {
        return new PostValueObject(
            title: $attributes['title'],
            body: $attributes['body'],
            description: $attributes['description']
        );
    } 
}