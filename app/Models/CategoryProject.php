<?php

namespace App\Models;

use App\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProject extends Model
{
    use HasFactory;

    protected $table = 'category_projects';


    protected $fillable = [
        'name',
        'description'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
