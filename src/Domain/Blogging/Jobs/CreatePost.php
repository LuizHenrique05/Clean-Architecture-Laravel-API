<?php

declare(strict_types=1);

namespace Domain\Blogging\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Support\Str;
use Domain\Blogging\Aggregates\PostAggregate;

class CreatePost implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public PostValueObject $object
    ) {}

    public function handle() : void
    {
        PostAggregate::retrieve(
            Str::uuid()->toString()
        )->createPost(
            object: $this->object,
            userId: 1
        )->persist();
    }
}
