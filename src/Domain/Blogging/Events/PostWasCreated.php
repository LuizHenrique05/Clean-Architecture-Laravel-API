<?php

declare(strict_types=1);

namespace Domain\Blogging\Events;

use Spatie\EventSourcing\StoredEvents\ShouldBeStored;
use Domain\Blogging\ValueObjects\PostValueObject;

class PostWasCreated extends ShouldBeStored
{
    public function __construct(
        public PostValueObject $object,
        public int $userId
    ) {}
}