<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'eyebrow',
        'title',
        'title_highlight',
        'lead_text',
        'image',
        'experience_years',
        'experience_text',
        'features',
        'stat1_count',
        'stat1_suffix',
        'stat1_label',
        'stat2_count',
        'stat2_suffix',
        'stat2_label',
        'stat3_count',
        'stat3_suffix',
        'stat3_label',
    ];

    protected $casts = [
        'features' => 'array',
        'stat1_count' => 'integer',
        'stat2_count' => 'integer',
        'stat3_count' => 'integer',
    ];

    public function getImageUrlAttribute(): string
    {
        if (!$this->image) {
            return asset('images/doctor.jpg');
        }
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset($this->image);
    }
}

