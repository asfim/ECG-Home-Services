<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'tag_text',
        'tag_class',
        'tag_icon',
        'icon',
        'icon_class',
        'image',
        'description',
        'booking_service_name',
        'action_link',
        'action_text',
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
            return asset('images/ecg-machine.jpg');
        }
        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        }
        return asset($this->image);
    }
}
