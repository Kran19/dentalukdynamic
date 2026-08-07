<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\Referral;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_patient_can_submit_appointment_booking(): void
    {
        $payload = [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '07123456789',
            'preferred_date' => now()->addDays(2)->format('Y-m-d'),
            'preferred_time' => 'morning',
            'visit_reason' => 'checkup',
            'notes' => 'First time visit',
        ];

        $response = $this->post('/book-online', $payload);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('appointments', [
            'full_name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '07123456789',
            'visit_reason' => 'checkup',
        ]);
    }

    public function test_dentist_can_submit_patient_referral(): void
    {
        $payload = [
            'dentistTitle' => 'Dr',
            'dentistFirstName' => 'Jane',
            'dentistLastName' => 'Smith',
            'dentistEmail' => 'drsmith@practice.co.uk',
            'dentistPhone' => '02081112222',

            'practiceName' => 'Smith Dental Practice',
            'practicePostcode' => 'HA0 2AB',
            'practiceAddress' => '100 High Street, Wembley',
            'practicePhone' => '02081112222',
            'practiceEmail' => 'reception@smithdental.co.uk',

            'patientTitle' => 'Mr',
            'patientFirstName' => 'Robert',
            'patientLastName' => 'Brown',
            'patientDOB' => '1990-05-15',
            'patientGender' => 'Male',
            'patientAddress' => '45 Park Lane, Wembley',
            'patientPostcode' => 'HA0 3CD',
            'patientPhone' => '07999888777',
            'patientEmail' => 'robert@example.com',
            'patientMedicalHistory' => 'No known allergies',

            'treatment' => ['Implants', 'CBCT'],
            'referralType' => 'Routine',
            'refReason' => 'Evaluation for lower left molar implant',
        ];

        $response = $this->post('/referral-form', $payload);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('referrals', [
            'dentist_first_name' => 'Jane',
            'patient_first_name' => 'Robert',
            'referral_type' => 'Routine',
        ]);
    }
}
