<?php

declare(strict_types=1);

namespace Domain\Blogging\Actions;

use Domain\Blogging\ValueObjects\PostValueObject;
use Domain\Blogging\Models\Post;
use Illuminate\Support\Str;

class UpdatePost
{
    public static function handle(PostValueObject $object, Post $post) : bool
    {
        return $post->update($object->toArray());
    }
}