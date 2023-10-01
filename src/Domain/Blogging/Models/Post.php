<?php

declare(strict_types=1);

namespace Domain\Blogging\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Domain\Shared\Models\Concerns\HasSlug;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Domain\Shared\Models\User;
use Domain\Blogging\Models\Builders\PostBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasKey;
    use HasSlug;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'key',
        'title',
        'slug',
        'body',
        'description',
        'published',
        'user_id',
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    public function getRouteKeyName() : string
    {
        return 'key';
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    public function newEloquentBuilder($query): PostBuilder
    {
        return new PostBuilder(
            query: $query
        );
    }
}