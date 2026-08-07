<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'dentist_title',
        'dentist_first_name',
        'dentist_last_name',
        'dentist_email',
        'dentist_phone',
        'practice_name',
        'practice_postcode',
        'practice_address',
        'practice_phone',
        'practice_email',
        'patient_title',
        'patient_first_name',
        'patient_last_name',
        'patient_dob',
        'patient_gender',
        'patient_address',
        'patient_postcode',
        'patient_phone',
        'patient_email',
        'patient_medical_history',
        'treatments_required',
        'referral_type',
        'reason_for_referral',
        'status',
    ];

    protected $casts = [
        'patient_dob' => 'date',
        'treatments_required' => 'array',
    ];
}
