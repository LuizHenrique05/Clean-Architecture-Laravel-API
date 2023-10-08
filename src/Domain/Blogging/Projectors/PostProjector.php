<?php

declare(strict_types=1);

namespace Domain\Blogging\Projectors;

use Spatie\EventSourcing\EventHandlers\Projectors\Projector;
use Domain\Blogging\Events\PostWasCreated;
use Domain\Blogging\Actions\CreatePost;

class PostProjector extends Projector
{
    public function onPostWasCreated(PostWasCreated $event) : void
    {
        CreatePost::handle(
            object: $event->object
        );
    }
}