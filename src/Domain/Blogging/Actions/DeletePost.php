<?php

declare(strict_types=1);

namespace Domain\Blogging\Actions;

use Domain\Blogging\Models\Post;

class DeletePost
{
    public static function handle(int $postId) : bool
    {
        $post = Post::find($postId);

        return $post->delete();
    }
}