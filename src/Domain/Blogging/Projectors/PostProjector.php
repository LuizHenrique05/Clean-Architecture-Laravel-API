<?php

declare(strict_types=1);

namespace Domain\Blogging\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Domain\Blogging\Events\PostWasCreated;
use Domain\Blogging\Events\PostWasUpdated;
use Domain\Blogging\Actions\CreatePost;
use Domain\Blogging\Actions\UpdatePost;
use Domain\Blogging\Models\Post;

class PostProjector extends Projector
{
    public function onPostWasCreated(PostWasCreated $event) : void
    {
        CreatePost::handle(
            object: $event->object
        );
    }

    public function onPostWasUpdated(PostWasUpdated $event) : void
    {
        UpdatePost::handle(
            object: $event->object,
            post: $event->post
        );
    }
}