<?php

declare(strict_types=1);

namespace Domain\Blogging\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Domain\Blogging\Actions\DeletePost as DeletePostAction;

class DeletePost implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        public int $postId
    ) {}

    public function handle() : void
    {
        DeletePostAction::handle(
            postId: $this->postId
        );
    }
}
