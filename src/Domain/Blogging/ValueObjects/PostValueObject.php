<?php

declare(strict_types=1);

namespace Domain\Blogging\ValueObjects;

class PostValueObject
{
    public function __construct(
        public string $title,
        public null|string $body = null,
        public null|string $description = null,
        public null|bool $published = false
    ) {}

    public function toArray() : array
    {        
        return [
            'title' => $this->title,
            'body' => $this->body,
            'description' => $this->description,
            'published' => $this->published,
        ];
    }
}