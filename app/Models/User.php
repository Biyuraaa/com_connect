<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'address',
        'phone',
        'date_of_birth',
        'gender',
        'image',
        'age',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function user_communities(): HasMany
    {
        return $this->hasMany(UserCommunity::class);
    }

    public function user_projects(): HasMany
    {
        return $this->hasMany(UserProject::class);
    }

    public function user_rewards(): HasMany
    {
        return $this->hasMany(UserReward::class);
    }

    public function project(): HasMany
    {
        return $this->hasMany(Project::class, 'organizer_id');
    }

    public function community(): HasMany
    {
        return $this->hasMany(Community::class, 'leader_id');
    }


    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }
}
