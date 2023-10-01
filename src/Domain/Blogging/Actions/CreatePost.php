<?php

declare(strict_types=1);

namespace Domain\Blogging\Actions;

use Domain\Blogging\ValueObjects\PostValueObject;
use Domain\Blogging\Models\Post;
use Illuminate\Support\Str;

class CreatePost
{
    public static function handle(PostValueObject $object) : Post
    {
        return Post::create(array_merge(
            $object->toArray(),
            [
                'slug' => Str::slug($object->title),
                'user_id' => 1
            ]
        ));
    }
}