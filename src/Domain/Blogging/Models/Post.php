<?php

declare(strict_types=1);

namespace Domain\Blogging\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\HaSlug;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasKey;
    use HaSlug;
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
}
