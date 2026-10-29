<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'title_highlight',
        'subtitle',
        'badge_text',
        'badge_icon',
        'image',
        'btn1_text',
        'btn1_link',
        'btn1_icon',
        'btn2_text',
        'btn2_link',
        'btn2_icon',
        'float_card_1_title',
        'float_card_1_subtitle',
        'float_card_1_icon',
        'float_card_2_title',
        'float_card_2_subtitle',
        'float_card_2_icon',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/slider-1.jpg');
        }
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset($this->image);
    }
}

