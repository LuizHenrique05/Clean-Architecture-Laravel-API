<?php

declare(strict_types=1);

namespace Domain\Shared\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Domain\Blogging\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasKey;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'key',
        'first_name',
        'last_name',
        'email',
        'password',
        'theme',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    public function posts() : HasMany
    {
        return $this->hasMany(
            related: Post::class,
            foreignId: 'user_id'
        );
    } 
}
