<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    // Define the relationship to Listings (A skill can have many listings)
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}
