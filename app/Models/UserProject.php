<?php

namespace App\Models;

use App\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProject extends Model
{
    use HasFactory;

    protected $table = 'user_projects';

    protected $fillable = [
        'user_id',
        'project_id',
        'role',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
