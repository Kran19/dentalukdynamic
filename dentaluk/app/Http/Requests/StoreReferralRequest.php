<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReferralRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Referring Dentist Details
            'dentistTitle' => ['required', 'string', 'max:10'],
            'dentistFirstName' => ['required', 'string', 'max:255'],
            'dentistLastName' => ['required', 'string', 'max:255'],
            'dentistEmail' => ['required', 'email', 'max:255'],
            'dentistPhone' => ['required', 'string', 'regex:/^[0-9\s\+\-\(\)]{10,20}$/'],

            // Referring Practice Details
            'practiceName' => ['required', 'string', 'max:255'],
            'practicePostcode' => ['required', 'string', 'max:20'],
            'practiceAddress' => ['required', 'string', 'max:500'],
            'practicePhone' => ['required', 'string', 'regex:/^[0-9\s\+\-\(\)]{10,20}$/'],
            'practiceEmail' => ['required', 'email', 'max:255'],

            // Patient Details
            'patientTitle' => ['required', 'string', 'max:10'],
            'patientFirstName' => ['required', 'string', 'max:255'],
            'patientLastName' => ['required', 'string', 'max:255'],
            'patientDOB' => ['required', 'date', 'before:today'],
            'patientGender' => ['required', 'string', 'in:Male,Female,Other,PreferNotToSay'],
            'patientAddress' => ['required', 'string', 'max:500'],
            'patientPostcode' => ['required', 'string', 'max:20'],
            'patientPhone' => ['required', 'string', 'regex:/^[0-9\s\+\-\(\)]{10,20}$/'],
            'patientEmail' => ['required', 'email', 'max:255'],
            'patientMedicalHistory' => ['required', 'string', 'max:3000'],

            // Referral Type & Treatments Required
            'treatment' => ['required', 'array', 'min:1'],
            'treatment.*' => ['string'],
            'referralType' => ['required', 'string', 'in:Routine,Urgent'],
            'refReason' => ['required', 'string', 'max:3000'],
        ];
    }
}
