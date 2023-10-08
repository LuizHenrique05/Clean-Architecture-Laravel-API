<?php

declare(strict_types=1);

namespace Domain\Blogging\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;
use Domain\Blogging\ValueObjects\PostValueObject;
use Domain\Blogging\Models\Post;

class PostWasUpdated extends ShouldBeStored
{
    public function __construct(
        public PostValueObject $object,
        public Post $post
    ) {}
}