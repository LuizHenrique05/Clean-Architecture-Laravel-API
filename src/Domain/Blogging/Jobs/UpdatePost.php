<?php

declare(strict_types=1);

namespace Domain\Blogging\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\Actions\UpdatePost as UpdatePostAction;
use Domain\Blogging\ValueObjects\PostValueObject;
use Domain\Blogging\Models\Post;

class UpdatePost implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public PostValueObject $object,
        public Post $post
    ) {}

    public function handle() : void
    {
        UpdatePostAction::handle(
            object: $this->object,
            post: $this->post
        );
    }
}
