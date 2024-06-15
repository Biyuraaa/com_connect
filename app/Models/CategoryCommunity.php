<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryCommunity extends Model
{
    use HasFactory;

    protected $table = 'category_communities';

    protected $fillable = [
        'name',
        'description'
    ];

    public function communities(): HasMany
    {
        return $this->hasMany(Community::class);
    }
}
