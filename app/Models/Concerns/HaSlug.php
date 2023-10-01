<?php

declare(strict_types=1);

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HaSlug
{
    public static function bootHaSlug() : void
    {
        static::creating(fn (Model $model) => $model->slug = Str::slug($model->title));
    }
}