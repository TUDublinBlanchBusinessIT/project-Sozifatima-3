<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'skill',        // <-- CHANGE THIS!
        'title',
        'description',
        'location',
        'availability',
    ];
}
