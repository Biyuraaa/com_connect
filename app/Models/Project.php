<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'date',
        'location',
        'capacity',
        'image',
        'status',
        'organizer_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoryProject::class);
    }

    public function user_projects(): HasMany
    {
        return $this->hasMany(UserProject::class);
    }

    public function rewards(): HasMany
    {
        return $this->hasMany(Reward::class);
    }

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
