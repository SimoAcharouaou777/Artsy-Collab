<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Partener extends Model
{
    use HasFactory;
    protected $table = 'partners';

    public function projects()
    {
        $this->hasMany(Project::class);
    }
}
