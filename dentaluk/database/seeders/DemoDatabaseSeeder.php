<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Faq;
use App\Models\FeeItem;
use App\Models\Media;
use App\Models\Referral;
use App\Models\SmileStory;
use App\Models\TeamMember;
use App\Models\Treatment;
use App\Models\TreatmentCategory;
use Illuminate\Database\Seeder;

class DemoDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Demo Media Assets
        Media::updateOrCreate(
            ['filename' => 'dr_kishan_sheth.png'],
            [
                'file_path' => 'assets/images/team.png',
                'disk' => 'public',
                'mime_type' => 'image/png',
                'file_size' => 245120,
                'alt_text' => 'Dr Kishan Sheth - Principal Dentist',
            ]
        );

        // 2. Seed Demo Team Staff
        TeamMember::updateOrCreate(
            ['name' => 'Dr. Kishan Sheth'],
            [
                'role' => 'Principal Dentist & Implantologist',
                'gdc_number' => 'GDC-258912',
                'bio' => 'Dr Kishan Sheth leads Icon Dental Wembley with a focus on minimally invasive cosmetic dentistry and full-mouth implant rehabilitation.',
                'category' => 'Dentists',
                'image_path' => 'assets/images/team.png',
                'sort_order' => 1,
            ]
        );

        TeamMember::updateOrCreate(
            ['name' => 'Elena Rostova'],
            [
                'role' => 'Lead Dental Hygienist',
                'gdc_number' => 'GDC-194820',
                'bio' => 'Specializes in periodontics, preventative gum therapies, and AirFlow stain removal.',
                'category' => 'Hygienists',
                'image_path' => 'assets/images/clinic room.png',
                'sort_order' => 2,
            ]
        );

        // 3. Seed Demo Fee Items
        FeeItem::updateOrCreate(
            ['treatment_item' => 'New Patient Dental Examination & X-Rays'],
            [
                'nhs_fee' => 'Band 1 (£26.80)',
                'private_fee' => '£65.00',
                'denplan_fee' => 'Included',
                'sort_order' => 1,
            ]
        );

        FeeItem::updateOrCreate(
            ['treatment_item' => 'Premium Boutique Home Teeth Whitening'],
            [
                'nhs_fee' => 'N/A (Cosmetic)',
                'private_fee' => '£350.00',
                'denplan_fee' => '£315.00',
                'sort_order' => 2,
            ]
        );

        // 4. Seed Demo Appointments
        Appointment::updateOrCreate(
            ['email' => 'demo.patient@example.com'],
            [
                'full_name' => 'Eleanor Vance',
                'phone' => '07700 900123',
                'preferred_date' => date('Y-m-d', strtotime('+3 days')),
                'preferred_time' => '10:30 AM',
                'visit_reason' => 'Cosmetic Teeth Whitening Consultation',
                'status' => 'confirmed',
            ]
        );

        // 5. Seed Demo Dentist Referrals
        Referral::updateOrCreate(
            ['patient_phone' => '07700 900456'],
            [
                'dentist_title' => 'Dr',
                'dentist_first_name' => 'Marcus',
                'dentist_last_name' => 'Vance',
                'dentist_email' => 'marcus@highstreetdental.co.uk',
                'dentist_phone' => '0208 555 0199',
                'practice_name' => 'High Street Dental Practice',
                'practice_postcode' => 'HA0 2AB',
                'practice_address' => '12 High Street, Wembley',
                'practice_phone' => '0208 555 0199',
                'practice_email' => 'info@highstreetdental.co.uk',
                'patient_title' => 'Mr',
                'patient_first_name' => 'Arthur',
                'patient_last_name' => 'Pendelton',
                'patient_dob' => '1985-06-12',
                'patient_gender' => 'Male',
                'patient_address' => '45 Station Road, Wembley',
                'patient_postcode' => 'HA0 3CD',
                'patient_email' => 'arthur.p@example.com',
                'patient_medical_history' => 'No known allergies or medical contraindications.',
                'treatments_required' => ['Dental Implants', 'Bone Grafting'],
                'referral_type' => 'Routine',
                'reason_for_referral' => 'Complex Implant Rehabilitation for missing lower molars.',
                'status' => 'pending',
            ]
        );
    }
}
