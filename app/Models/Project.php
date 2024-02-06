<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Partner;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function parteners()
    {
        return $this->belongsTo(Partner::class);
    }
}
