<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            // Management
            [
                'name' => 'Dr Kishan Sheth',
                'role' => 'Principal Dentist',
                'gdc_number' => 'GDC: 279027',
                'image_path' => 'assets/images/kishan seth.jpeg',
                'bio' => "BDS King’s College London 2018\nDr. Kishan Sheth graduated in 2018 from King’s College London as a runner up for the prestigious Jose Souyave Prize for excellence in root canal treatment and then embarked on his vocational training in Central London.\n\nKish has spoken amongst respected leaders at national and international conferences in Dubai, Sharjah and Atlanta, and has numerous publications out in the dental press. Kish has completed training in 'Advanced Cosmetic and Restorative Dentistry' with renowned dentist Dr Chris Orr at Advanced Dental Seminars and furthered his 'Oral Surgery and Surgical Implantology' training.",
                'category' => 'Management',
                'sort_order' => 1,
            ],
            [
                'name' => 'Dr Hina Kanani',
                'role' => 'Operations Manager',
                'gdc_number' => null,
                'image_path' => 'assets/images/heena.jpeg',
                'bio' => "Hina is the Business Operations Manager at ICON DENTAL Wembley, where she is dedicated to ensuring that every patient receives an exceptional experience from the moment they walk through our doors. With a strong background in healthcare, Hina is a qualified medical doctor and currently works as a General Practitioner within the NHS.",
                'category' => 'Management',
                'sort_order' => 2,
            ],
            [
                'name' => 'Rajeshri Sheth',
                'role' => 'Practice Manager',
                'gdc_number' => null,
                'image_path' => 'assets/images/team/sarah.png',
                'bio' => "Rajeshri Sheth is our dedicated Practice Manager, coordinating clinical administration, patient relations, and ensuring our Wembley clinic services run smoothly.",
                'category' => 'Management',
                'sort_order' => 3,
            ],

            // Dentists
            [
                'name' => 'Dr Hana Shafi',
                'role' => 'Associate Dentist',
                'gdc_number' => 'GDC: 310312',
                'image_path' => 'assets/images/team/emily.png',
                'bio' => "Dr Hana Shafi is an Associate Dentist specializing in preventive care, restorative work, and root canal therapy. She has a gentle clinical manner that helps put nervous patients at ease.",
                'category' => 'Dentists',
                'sort_order' => 4,
            ],
            [
                'name' => 'Dr Rawan Kamil',
                'role' => 'Associate Dentist',
                'gdc_number' => 'GDC: 325702',
                'image_path' => 'assets/images/rawan.jpeg',
                'bio' => "Rawan graduated from Bucharest, Romania with a Doctor of Dental Medicine, with a 90% average. She is passionate about dentistry and the vital role it plays in overall health and quality of life.",
                'category' => 'Dentists',
                'sort_order' => 5,
            ],
            [
                'name' => 'Dr Deesha Ramji',
                'role' => 'Associate Dentist',
                'gdc_number' => 'GDC: 84160',
                'image_path' => 'assets/images/team/sophie.png',
                'bio' => "Dr Deesha Ramji is a highly skilled Associate Dentist with extensive experience in aesthetic procedures, patient-first general treatments, and clear aligner therapies.",
                'category' => 'Dentists',
                'sort_order' => 6,
            ],
            [
                'name' => 'Dr Mohammed Maki',
                'role' => 'Associate Dentist',
                'gdc_number' => 'GDC: 295609',
                'image_path' => 'assets/images/mohmad_maki.jpeg',
                'bio' => "After graduating from the University of Plymouth, Mohammed has enjoyed all aspects of general dentistry, with a particular interest in aesthetic dentistry and helping patients achieve healthy, confident smiles.",
                'category' => 'Dentists',
                'sort_order' => 7,
            ],
            [
                'name' => 'Dr Rishil Lamba',
                'role' => 'Associate Dentist',
                'gdc_number' => 'GDC: 111524',
                'image_path' => 'assets/images/team/michael.png',
                'bio' => "Dr Rishil Lamba is an Associate Dentist committed to excellence in all areas of general dentistry. He specializes in preventative care, restorative treatments, and root canal therapy.",
                'category' => 'Dentists',
                'sort_order' => 8,
            ],

            // Hygienists
            [
                'name' => 'Sara Moshtofar',
                'role' => 'Dental Hygienist',
                'gdc_number' => null,
                'image_path' => 'assets/images/sara.jpeg',
                'bio' => "Sara qualified from the prestigious Barts and The London School of Medicine and Dentistry with a dual qualification in Dental Hygiene and Dental Therapy.",
                'category' => 'Hygienists',
                'sort_order' => 9,
            ],
            [
                'name' => 'Jackie Jigmeddamba',
                'role' => 'Dental Hygienist',
                'gdc_number' => 'GDC: 280230',
                'image_path' => 'assets/images/team/sophie.png',
                'bio' => "Jackie Jigmeddamba works closely with patients to prevent gum disease, delivering exceptional hygienist treatments, deep cleans, and customized oral hygiene routines.",
                'category' => 'Hygienists',
                'sort_order' => 10,
            ],
            [
                'name' => 'Vaish Panchal',
                'role' => 'Dental Hygienist',
                'gdc_number' => 'GDC: 311286',
                'image_path' => 'assets/images/team/emily.png',
                'bio' => "Vaish Panchal is an experienced Dental Hygienist specializing in deep scaling, stain removal, and educating patients on optimal home care routines.",
                'category' => 'Hygienists',
                'sort_order' => 11,
            ],

            // Nurses
            [
                'name' => 'Ghezala Benmoulai',
                'role' => 'Dental Nurse',
                'gdc_number' => null,
                'image_path' => 'assets/images/team/sarah.png',
                'bio' => "Ghezala Benmoulai supports our clinical staff as a Dental Nurse, maintaining strict hygiene standards and sterilization protocols.",
                'category' => 'Nurses',
                'sort_order' => 12,
            ],
            [
                'name' => 'Rickey Lama Sherpa',
                'role' => 'Trainee Dental Nurse',
                'gdc_number' => null,
                'image_path' => 'assets/images/ricky.jpeg',
                'bio' => "Rickey Lama Sherpa is a Trainee Dental Nurse, assisting in patient care and sterilization protocols while completing clinical qualifications.",
                'category' => 'Nurses',
                'sort_order' => 13,
            ],
            [
                'name' => 'Samet Karahan',
                'role' => 'Trainee Dental Nurse',
                'gdc_number' => null,
                'image_path' => 'assets/images/team/michael.png',
                'bio' => "Samet Karahan is a Trainee Dental Nurse, focused on clinical preparation, surgery hygiene, and ensuring patients feel relaxed.",
                'category' => 'Nurses',
                'sort_order' => 14,
            ],

            // Front of House
            [
                'name' => 'Hina Farooq',
                'role' => 'Receptionist',
                'gdc_number' => null,
                'image_path' => 'assets/images/team/sarah.png',
                'bio' => "Our patient care coordinators ensure a seamless journey from booking your consultation to completing your custom treatment plan.",
                'category' => 'FrontOfHouse',
                'sort_order' => 15,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['name' => $member['name']], $member);
        }
    }
}
