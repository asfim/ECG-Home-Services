<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'designation',
        'badge_text',
        'badge_class',
        'badge_icon',
        'image',
        'description',
        'tags',
        'features',
        'btn1_text',
        'btn1_link',
        'btn1_icon',
        'btn1_class',
        'btn2_text',
        'btn2_link',
        'btn2_icon',
        'btn2_class',
        'booking_service',
        'order',
        'is_active',
    ];

    protected $casts = [
        'tags' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/1.jpg');
        }
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset($this->image);
    }
}
