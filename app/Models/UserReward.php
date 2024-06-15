<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserReward extends Model
{
    use HasFactory;

    protected $table = 'user_rewards';

    protected $fillable = [
        'user_id',
        'reward_id',
        'organizer_id',
        'redeemed_at',
        'expires_at',
        'status',
        'code',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function generateUniqueCode(): string
    {
        do {
            $code =
                mt_rand(1000, 9999) . '-' .
                mt_rand(1000, 9999) . '-' .
                mt_rand(1000, 9999);
        } while (self::where('code', $code)->exists());

        return $code;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->code = self::generateUniqueCode();
        });
    }


    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isRedeemed(): bool
    {
        return $this->status === 'redeemed';
    }

    public function isExpired(): bool
    {
        return $this->status === 'expired';
    }
}
