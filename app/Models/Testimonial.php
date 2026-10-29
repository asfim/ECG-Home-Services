<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'location',
        'rating',
        'comment',
        'avatar_text',
        'avatar_class',
        'is_verified',
        'order',
        'is_active',
    ];

    protected $casts = [
        'rating' => 'float',
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];
}
