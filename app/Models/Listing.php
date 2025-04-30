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

    // Automatically load the related skill data with the listing
    protected $with = ['skill']; // ⭐️ Auto-load skill relationship ⭐️

    /**
     * Define the relationship with the Skill model.
     * Each listing belongs to one skill.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');  // skill_id is the foreign key for the skill
    }
}
