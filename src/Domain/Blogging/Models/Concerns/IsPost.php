<?php

declare(strict_types=1);

namespace Domain\Blogging\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait IsPost
{
    public static function BootIsPost() : void
    {
        static::creating(function(Model $model) {
            $model->key = Str::key(substr(strtolower(class_basename($model)), 0, 3) . '_');
            $model->slug = Str::slug($model->title);
        });
    }
}