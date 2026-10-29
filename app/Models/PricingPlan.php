<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'name',
        'subtitle',
        'price',
        'currency',
        'is_featured',
        'ribbon_text',
        'features',
        'btn_text',
        'btn_service_name',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
        'price' => 'integer',
    ];
}

