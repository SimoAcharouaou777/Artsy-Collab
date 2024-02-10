<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Partner;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'projects';
    protected $fillable = [
        'title',
        'description',
        'requirements',
        'image',
        'status',
        'partner_id',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('status');
    }
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
