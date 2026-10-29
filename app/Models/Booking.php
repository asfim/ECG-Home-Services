<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'patient_name',
        'phone',
        'service',
        'area',
        'address',
        'preferred_date',
        'preferred_time',
        'female_technician',
        'status',
        'notes',
    ];

    protected $casts = [
        'female_technician' => 'boolean',
        'preferred_date' => 'date',
    ];
}

