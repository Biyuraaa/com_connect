<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCommunity extends Model
{
    use HasFactory;

    protected $table = 'user_communities';

    protected $fillable = [
        'user_id',
        'community_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function community(): BelongsTo
    {
        return $this->belongsTo(Community::class);
    }
}
