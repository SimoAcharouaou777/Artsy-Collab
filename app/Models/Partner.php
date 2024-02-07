<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Partner extends Model
{
    use HasFactory;
    protected $table = 'partners';
    protected $fillable = [
        'name',
        'description',
        'image',
    ];
    public function projects()
    {
        $this->hasMany(Project::class);
    }
}
