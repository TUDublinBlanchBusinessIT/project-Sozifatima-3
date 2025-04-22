<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'skill_id',
        'title',
        'description',
        'location',
        'availability',
    ];

    // Define the relationship to Skill (Each listing belongs to one skill)
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
