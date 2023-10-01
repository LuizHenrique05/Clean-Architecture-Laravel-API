<?php

declare(strict_types=1);

namespace Domain\Shared\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHaSlug() : void
    {
        static::creating(fn (Model $model) => $model->slug = Str::slug($model->title));
    }
}