<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function skills()
{
    return $this->belongsToMany(Skill::class);
}
use HasFactory;

    protected $casts = [
        'skills_used' => 'array',
    ];

}   
