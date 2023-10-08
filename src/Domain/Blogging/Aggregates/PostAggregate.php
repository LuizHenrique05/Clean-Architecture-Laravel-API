<?php

declare(strict_types=1);

namespace Domain\Blogging\Aggregates;

use Spatie\EventSourcing\AggregateRoots\AggregateRoot;
use Domain\Blogging\ValueObjects\PostValueObject;
use Domain\Blogging\Events\PostWasCreated;
use Domain\Blogging\Events\PostWasUpdated;
use Domain\Blogging\Models\Post;

class PostAggregate extends AggregateRoot
{
    public function createPost(PostValueObject $object, int $userId) : self
    {
        $this->recordThat(
            domainEvent: new PostWasCreated(
                object: $object,
                userId: $userId
            )
        );

        return $this;
    }

    public function updatePost(PostValueObject $object, Post $post) : self
    {
        $this->recordThat(
            domainEvent: new PostWasUpdated(
                object: $object,
                post: $post
            )
        );

        return $this;
    }
}