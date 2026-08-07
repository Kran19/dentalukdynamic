<?php

namespace Database\Seeders;

use App\Models\Faq;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\SmileStory;
use App\Models\Treatment;
use App\Models\TreatmentCategory;
use Illuminate\Database\Seeder;

class CmsContentSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Homepage & Sections
        $homePage = Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title' => 'Home Page',
                'meta_title' => 'Icon Dental- Wembley | Exceptional Dental Care',
                'meta_description' => 'At Icon Dental- Wembley, we combine advanced technology with a gentle, personal touch to create healthy, confident smiles that last a lifetime.',
                'is_published' => true,
            ]
        );

        // Hero Section
        PageSection::updateOrCreate(
            ['page_id' => $homePage->id, 'section_key' => 'hero'],
            [
                'title' => "Enhance Your Smile.\nEnhance Your Confidence.",
                'subtitle' => 'NHS & Private Dentistry.',
                'content' => [
                    'brand_label' => 'ICON DENTAL Wembley',
                    'description' => 'Experience modern dentistry in a comfortable, welcoming environment where your smile comes first. We combine advanced technology with a gentle touch to deliver exceptional results.',
                    'primary_btn_text' => 'Book Consultation',
                    'primary_btn_url' => '/book-online',
                    'secondary_btn_text' => 'Learn More',
                    'secondary_btn_url' => '/treatments',
                ],
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        // Welcome Section
        PageSection::updateOrCreate(
            ['page_id' => $homePage->id, 'section_key' => 'welcome'],
            [
                'title' => 'Welcome To ICON DENTAL Wembley',
                'subtitle' => 'ICON DENTAL Wembley is a thriving mixed NHS and Private practice located in the heart of Wembley.',
                'content' => [
                    'principal_doctor' => 'Dr Kishan Sheth',
                    'paragraph_1' => 'Under the leadership of Principal Dentist Dr Kishan Sheth, our team proudly delivers holistic, patient-centred care. We believe in combining advanced technology with a compassionate approach, attracting a diverse community of patients who trust us with their smiles.',
                    'paragraph_2' => 'Our commitment to excellence means we constantly update our knowledge and techniques. From routine dentistry to advanced aesthetics, we offer a broad spectrum of treatments. For complex cases, we provide seamless referral pathways to consultant specialists across both NHS and private sectors.',
                    'card_heading' => 'Ready to transform your smile?',
                    'card_desc' => 'Experience the highest quality in modern dentistry. Book your appointment today and let our expert team take care of you.',
                ],
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        // Services Cards Section
        PageSection::updateOrCreate(
            ['page_id' => $homePage->id, 'section_key' => 'services'],
            [
                'title' => 'Some of our dental services include',
                'content' => [
                    ['icon' => 'fa-solid fa-hands-bubbles', 'title' => 'Hygienist'],
                    ['icon' => 'fa-regular fa-sun', 'title' => 'Tooth Whitening'],
                    ['icon' => 'fa-solid fa-users', 'title' => 'Family & General'],
                    ['icon' => 'fa-regular fa-face-smile', 'title' => 'Invisalign'],
                    ['icon' => 'fa-solid fa-crown', 'title' => 'Bridges & Crowns'],
                    ['icon' => 'fa-solid fa-wand-magic-sparkles', 'title' => 'Bonding'],
                    ['icon' => 'fa-regular fa-face-smile-beam', 'title' => 'Cosmetic Dentistry'],
                    ['icon' => 'fa-solid fa-screwdriver-wrench', 'title' => 'Implants'],
                ],
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        // Why Choose Us Section
        PageSection::updateOrCreate(
            ['page_id' => $homePage->id, 'section_key' => 'why_choose_us'],
            [
                'title' => 'Exceptional Care. Outstanding Results.',
                'subtitle' => 'WHY CHOOSE ICON DENTAL WEMBLEY',
                'content' => [
                    'intro' => 'We focus on providing an outstanding patient experience from the moment you contact us.',
                    'cards' => [
                        ['icon' => 'fa-solid fa-star', 'title' => '5-Star Patient Care', 'desc' => 'Friendly, professional service with patient comfort at the heart of everything we do.'],
                        ['icon' => 'fa-solid fa-user-doctor', 'title' => 'Experienced Dental Team', 'desc' => 'A highly skilled team dedicated to delivering excellent clinical outcomes.'],
                        ['icon' => 'fa-solid fa-microscope', 'title' => 'Advanced Technology', 'desc' => 'Modern equipment and digital dentistry for accurate diagnosis and comfortable treatment.'],
                        ['icon' => 'fa-solid fa-gem', 'title' => 'Premium Materials', 'desc' => 'Using trusted, evidence-based materials for durable, long-lasting results.'],
                        ['icon' => 'fa-solid fa-briefcase-medical', 'title' => 'Comprehensive Services', 'desc' => 'From routine care to advanced implant and cosmetic treatments.'],
                        ['icon' => 'fa-solid fa-credit-card', 'title' => 'Flexible Finance Available', 'desc' => 'Spread the cost of treatment with affordable payment options.'],
                    ],
                ],
                'sort_order' => 4,
                'is_active' => true,
            ]
        );

        // Emergency & Makeover Section
        PageSection::updateOrCreate(
            ['page_id' => $homePage->id, 'section_key' => 'emergency_makeover'],
            [
                'title' => 'Transform Your Smile',
                'subtitle' => 'SMILE MAKEOVER',
                'content' => [
                    'makeover_desc' => 'Our smile makeover treatments combine cosmetic dentistry techniques to create stunning, natural-looking results.',
                    'makeover_pills' => ['Composite Bonding', 'Veneers', 'Teeth Whitening', 'Gum Contouring'],
                    'emergency_title' => 'Emergency Dentist in Wembley',
                    'emergency_desc' => 'Dental emergencies can happen at any time. We provide same-day emergency appointments whenever possible for:',
                    'emergency_badges' => ['Toothache', 'Broken Teeth', 'Lost Fillings', 'Swelling', 'Dental Trauma', 'Infection'],
                ],
                'sort_order' => 5,
                'is_active' => true,
            ]
        );

        // New Patient CTA Section
        PageSection::updateOrCreate(
            ['page_id' => $homePage->id, 'section_key' => 'new_patient'],
            [
                'title' => 'New Patients Welcome',
                'subtitle' => 'NEW PATIENTS',
                'content' => [
                    'description' => "Whether you're looking for a family dentist, cosmetic treatment, or emergency appointment, we're here to help.",
                    'checklist' => [
                        'Comprehensive Dental Examination & Digital X-Rays',
                        'Oral Health Assessment',
                        'Personalised Treatment Plan',
                        'Opportunity to Discuss Concerns',
                    ],
                ],
                'sort_order' => 6,
                'is_active' => true,
            ]
        );

        // 2. About Page & Sections
        $aboutPage = Page::updateOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'About Us Overview',
                'meta_title' => 'About Us | Icon Dental Wembley',
                'meta_description' => 'Learn about our state-of-the-art clinic, our history, and our patient-centered care approach.',
                'is_published' => true,
            ]
        );

        PageSection::updateOrCreate(
            ['page_id' => $aboutPage->id, 'section_key' => 'values'],
            [
                'title' => 'Our Core Values',
                'subtitle' => 'EXCELLENCE & CARE',
                'content' => [
                    ['icon' => 'fa-solid fa-heart', 'title' => 'Patient-Centred Care', 'desc' => 'Every treatment is tailored to your individual needs and comfort.'],
                    ['icon' => 'fa-solid fa-shield-halved', 'title' => 'Clinical Integrity', 'desc' => 'We maintain the highest standards of safety, hygiene, and ethics.'],
                    ['icon' => 'fa-solid fa-award', 'title' => 'Continuous Innovation', 'desc' => 'Investing in continuous professional development and modern tech.'],
                    ['icon' => 'fa-solid fa-handshake', 'title' => 'Transparent Pricing', 'desc' => 'Clear fee structures with zero hidden charges.'],
                ],
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        // 3. Treatment Categories & Treatments (Subpages Seed Data)
        $checkCategory = TreatmentCategory::updateOrCreate(
            ['slug' => 'check-my-teeth'],
            ['name' => 'Check My Teeth', 'description' => 'Preventive dentistry and diagnostic examinations.', 'sort_order' => 1]
        );

        Treatment::updateOrCreate(
            ['slug' => 'dental-checkup'],
            [
                'category_id' => $checkCategory->id,
                'name' => 'Dental Check-up',
                'short_desc' => 'Comprehensive clinical assessment of teeth, gums, jaw joints, and oral soft tissues.',
                'full_content' => 'Regular dental check-ups are essential for maintaining lifelong oral health. During your visit, our dentists perform a thorough examination of your teeth, gums, and oral soft tissues using low-radiation digital X-rays.',
                'icon_class' => 'fa-solid fa-clipboard-check',
                'sort_order' => 1,
                'is_published' => true,
            ]
        );

        Treatment::updateOrCreate(
            ['slug' => 'dental-hygienist'],
            [
                'category_id' => $checkCategory->id,
                'name' => 'Hygienist Services',
                'short_desc' => 'Professional scale and polish to prevent gum disease and remove stubborn plaque.',
                'full_content' => 'Our dental hygienists specialize in gum health and oral hygiene care. Regular professional cleaning removes calculus and staining, keeping your breath fresh and your smile bright.',
                'icon_class' => 'fa-solid fa-hands-bubbles',
                'sort_order' => 2,
                'is_published' => true,
            ]
        );

        $repairCategory = TreatmentCategory::updateOrCreate(
            ['slug' => 'repair-my-teeth'],
            ['name' => 'Repair My Teeth', 'description' => 'Restorative treatments for damaged and decayed teeth.', 'sort_order' => 2]
        );

        Treatment::updateOrCreate(
            ['slug' => 'tooth-fillings'],
            [
                'category_id' => $repairCategory->id,
                'name' => 'Tooth Fillings',
                'short_desc' => 'Natural composite resin fillings to seamlessly repair minor cavities.',
                'full_content' => 'Tooth-coloured composite fillings restore decayed or fractured teeth with a seamless, natural appearance that matches your natural tooth shade.',
                'icon_class' => 'fa-solid fa-tooth',
                'sort_order' => 1,
                'is_published' => true,
            ]
        );

        Treatment::updateOrCreate(
            ['slug' => 'root-canal'],
            [
                'category_id' => $repairCategory->id,
                'name' => 'Root Canal Treatment',
                'short_desc' => 'Pain-free endodontic therapy to save infected teeth and eliminate toothache.',
                'full_content' => 'Root canal therapy removes infected dental pulp, cleans the root canal system, and seals the tooth, saving your natural tooth from extraction.',
                'icon_class' => 'fa-solid fa-syringe',
                'sort_order' => 2,
                'is_published' => true,
            ]
        );

        // 4. Smile Stories
        SmileStory::updateOrCreate(
            ['patient_name' => 'Sarah T.'],
            [
                'location' => 'Wembley',
                'category' => 'SMILE MAKEOVER',
                'before_image' => 'assets/images/stories/sarah_before.png',
                'after_image' => 'assets/images/stories/sarah_after.png',
                'avatar_image' => 'assets/images/stories/avatar_sarah.png',
                'quote' => 'From Uneasy to Unstoppable',
                'story_body' => 'Porcelain veneers and teeth whitening gave Sarah the confidence to smile without holding back.',
                'sort_order' => 1,
                'is_published' => true,
            ]
        );

        SmileStory::updateOrCreate(
            ['patient_name' => 'James R.'],
            [
                'location' => 'Wembley',
                'category' => 'DENTAL IMPLANTS',
                'before_image' => 'assets/images/stories/james_before.png',
                'after_image' => 'assets/images/stories/james_after.png',
                'avatar_image' => 'assets/images/stories/avatar_james.png',
                'quote' => 'A New Smile, A New Chapter',
                'story_body' => 'Dental implants restored James\' smile and allowed him to enjoy life\'s little moments again.',
                'sort_order' => 2,
                'is_published' => true,
            ]
        );

        // 5. FAQs
        Faq::updateOrCreate(
            ['question' => 'Are you accepting new patients?'],
            [
                'category' => 'General',
                'answer' => 'Yes! Icon Dental Wembley welcomes both NHS and private new patients. Book online or call reception.',
                'sort_order' => 1,
                'is_published' => true,
            ]
        );
    }
}
