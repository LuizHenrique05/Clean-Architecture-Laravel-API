<?php

declare(strict_types=1);

namespace Domain\Blogging\Reports;

use Domain\Blogging\Events\PostWasCreated;
use Spatie\EventSourcing\EventHandlers\Projectors\EventQuery;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;
use Spatie\Period\Period;

class PostsCreatedOverPeriod extends EventQuery
{
    private int $totalPosts = 0;

    public function __construct(
        private Period $period,
    ) {
        EloquentStoredEvent::query()
            ->whereEvent(
                eventClasses: PostWasCreated::class,
            )->whereDate(
                column: 'created_at', 
                operator: '>=', 
                value: $this->period->start()
            )->whereDate(
                column: 'created_at', 
                operator: '<=', 
                value: $this->period->end()
            )->each(
                callback: fn(EloquentStoredEvent $event) => $this->apply($event->toStoredEvent())
            );
    }

    protected function applyPostWasCreated(PostWasCreated $event) : void 
    {
        $this->totalPosts += 1;
    }

    public function totalPosts() : int
    {
        return $this->totalPosts;
    }
}