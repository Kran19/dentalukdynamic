<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReferralRequest;
use App\Models\Referral;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReferralController extends Controller
{
    public function create(): View
    {
        return view('pages.referral-form');
    }

    public function store(StoreReferralRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Referral::create([
            'dentist_title' => $validated['dentistTitle'],
            'dentist_first_name' => $validated['dentistFirstName'],
            'dentist_last_name' => $validated['dentistLastName'],
            'dentist_email' => $validated['dentistEmail'],
            'dentist_phone' => $validated['dentistPhone'],
            'practice_name' => $validated['practiceName'],
            'practice_postcode' => $validated['practicePostcode'],
            'practice_address' => $validated['practiceAddress'],
            'practice_phone' => $validated['practicePhone'],
            'practice_email' => $validated['practiceEmail'],
            'patient_title' => $validated['patientTitle'],
            'patient_first_name' => $validated['patientFirstName'],
            'patient_last_name' => $validated['patientLastName'],
            'patient_dob' => $validated['patientDOB'],
            'patient_gender' => $validated['patientGender'],
            'patient_address' => $validated['patientAddress'],
            'patient_postcode' => $validated['patientPostcode'],
            'patient_phone' => $validated['patientPhone'],
            'patient_email' => $validated['patientEmail'],
            'patient_medical_history' => $validated['patientMedicalHistory'],
            'treatments_required' => $validated['treatment'],
            'referral_type' => $validated['referralType'],
            'reason_for_referral' => $validated['refReason'],
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Referral submitted successfully. Our team will review the referral details and contact you within 48 hours.');
    }
}
