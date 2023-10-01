<?php

declare(strict_types=1);

namespace App\Jobs\Posts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\Actions\CreatePost as CreatePostAction;
use Domain\Blogging\ValueObjects\PostValueObject;

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
        CreatePostAction::handle(
            object: $this->object
        );
    }
}
