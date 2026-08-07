<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'preferred_date',
        'preferred_time',
        'visit_reason',
        'notes',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];
}
