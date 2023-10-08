<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Spatie\EventSourcing\Facades\Projectionist;
use Domain\Blogging\Projectors\PostProjector;
use Domain\Blogging\Reactors\PostReactor;

class EventSourcingServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        Projectionist::addProjectors(
            projectors: [PostProjector::class]
        );

        Projectionist::addReactors(
            reactors: [PostReactor::class]
        );
    }

    public function boot() : void
    {
        //
    }
}
