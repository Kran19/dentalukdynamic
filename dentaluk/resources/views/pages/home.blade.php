@php
    $heroSec = \App\Services\CmsService::getPageSection('home', 'hero');
    $welcomeSec = \App\Services\CmsService::getPageSection('home', 'welcome');
    $servicesSec = \App\Services\CmsService::getPageSection('home', 'services');
    $whyChooseSec = \App\Services\CmsService::getPageSection('home', 'why_choose_us');
    $emergencySec = \App\Services\CmsService::getPageSection('home', 'emergency_makeover');
    $newPatientSec = \App\Services\CmsService::getPageSection('home', 'new_patient');

    $phone = \App\Models\Setting::get('phone', config('clinic.phone'));
    $phoneClean = \App\Models\Setting::get('phone_clean', config('clinic.phone_clean'));
    $siteName = \App\Models\Setting::get('site_name', 'ICON DENTAL Wembley');
@endphp

<x-app-layout title="{{ $heroSec->page->meta_title ?? 'Icon Dental- Wembley | Exceptional Dental Care' }}" description="{{ $heroSec->page->meta_description ?? 'At Icon Dental- Wembley, we combine advanced technology with a gentle, personal touch to create healthy, confident smiles that last a lifetime.' }}">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container custom-container hero-content">
            <div class="hero-grid-alternative">
                
                <!-- LEFT SIDE: Masonry Image Grid -->
                <div class="hero-masonry">
                    <div class="masonry-col">
                        <img src="{{ asset('assets/images/clinic room.png') }}" class="masonry-item-1" alt="Smiling Patient">
                        <img src="{{ asset('assets/images/team.png') }}" class="masonry-item-3" alt="Clear Aligners Patient">
                    </div>
                    <div class="masonry-col">
                        <img src="{{ asset('assets/images/clinic reception waiting area.png') }}" class="masonry-item-2" alt="Clinic Reception">
                        <img src="{{ asset('assets/images/clinic room 2.png') }}" class="masonry-item-4" alt="Healthy Smile">
                    </div>
                </div>

                <!-- RIGHT SIDE: Content Area -->
                <div class="hero-text-content">
                    <span class="hero-" style="font-size:40px;color: #b1986f;"> {{ $heroSec->content['brand_label'] ?? 'ICON DENTAL Wembley' }}</span>
                    <br>
                
                    <span class="hero-title" style="font-size: 35px;"> {{ $heroSec->subtitle ?? 'NHS & Private Dentistry.' }}</span>
                    <br>

                    <h3 class="hero-title" style="font-size: 40px;">{!! nl2br(e($heroSec->title ?? "Enhance Your Smile.\nEnhance Your Confidence.")) !!}</h3>
                    <p class="hero-desc" style="font-size: 20px;">{{ $heroSec->content['description'] ?? 'Experience modern dentistry in a comfortable, welcoming environment where your smile comes first.' }}</p>
                    
                    <div class="btn-group-custom d-flex gap-3 hero-actions">
                        <a href="{{ url($heroSec->content['primary_btn_url'] ?? '/book-online') }}" class="btn-primary-custom px-4 py-3 m-0" style="font-size: 16px;">
                            <i class="fa-regular fa-calendar-check"></i> {{ $heroSec->content['primary_btn_text'] ?? 'Book Consultation' }}
                        </a>
                        <a href="{{ url($heroSec->content['secondary_btn_url'] ?? '/treatments') }}" class="btn-outline-custom px-4 py-3 m-0" style="font-size: 16px;">
                            {{ $heroSec->content['secondary_btn_text'] ?? 'Learn More' }} <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="section-padding">
        <div class="container custom-container">
            <div class="row align-items-center g-5 mb-5 premium-welcome-section">
                <div class="col-lg-7">
                    <h3 class="welcome-title text-start mb-4">{{ $welcomeSec->title ?? "Welcome To {$siteName}" }}</h3>
                    <h4>{{ $welcomeSec->subtitle ?? "ICON DENTAL Wembley is a thriving mixed NHS and Private practice located in the heart of Wembley." }}</h4>

                    <div class="welcome-text-content">
                        <p>{{ $welcomeSec->content['paragraph_1'] ?? 'Under the leadership of Principal Dentist Dr Kishan Sheth, our team proudly delivers holistic care.' }}</p>
                        <p>{{ $welcomeSec->content['paragraph_2'] ?? 'Our commitment to excellence means we constantly update our knowledge and techniques.' }}</p>
                    </div>
                </div>
                
                <div class="col-lg-5">
                    <div class="welcome-contact-card">
                        <div class="wcc-icon">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <h3 class="wcc-title">{{ $welcomeSec->content['card_heading'] ?? 'Ready to transform your smile?' }}</h3>
                        <p class="wcc-desc">{{ $welcomeSec->content['card_desc'] ?? 'Experience the highest quality in modern dentistry. Book your appointment today.' }}</p>
                        
                        <div class="wcc-number-wrapper">
                            <span class="wcc-label">Call our team directly</span>
                            <a href="tel:{{ $phoneClean }}" class="wcc-number">{{ $phone }}</a>
                        </div>
                        
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom w-100 mt-4">
                            <i class="fa-regular fa-calendar-check"></i> Book Online Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- DENTAL SERVICES DYNAMIC GRID -->
            @if ($servicesSec && isset($servicesSec->content))
                <div class="text-center mt-5 mb-4">
                    <h3 class="welcome-title" style="font-size: 32px;">{{ $servicesSec->title ?? 'Some of our dental services include' }}</h3>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($servicesSec->content as $srv)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="service-card p-3 p-md-4 text-center">
                                <div class="service-icon mb-3 mx-auto" style="position: static; box-shadow: none;">
                                    <i class="{{ $srv['icon'] ?? 'fa-solid fa-tooth' }}" style="font-size: 32px; color: var(--primary-blue);"></i>
                                </div>
                                <h3 class="service-title" style="font-size: clamp(14px, 4vw, 18px);">{{ $srv['title'] }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- Why Choose Us Section -->
    @if ($whyChooseSec)
        <section class="section-padding section-light-bg">
            <div class="container custom-container">
                <div class="text-center mb-5">
                    <span class="hero-badge">{{ $whyChooseSec->subtitle ?? 'WHY CHOOSE ICON DENTAL WEMBLEY' }}</span>
                    <h2 class="welcome-title">{!! nl2br(e($whyChooseSec->title ?? "Exceptional Care.\nOutstanding Results.")) !!}</h2>
                    <p class="welcome-desc mx-auto" style="max-width: 600px;">{{ $whyChooseSec->content['intro'] ?? 'We focus on providing an outstanding patient experience.' }}</p>
                </div>
                
                @if (isset($whyChooseSec->content['cards']))
                    <div class="row g-4">
                        @foreach ($whyChooseSec->content['cards'] as $card)
                            <div class="col-md-4">
                                <div class="why-choose-card d-block text-center p-4">
                                    <i class="{{ $card['icon'] ?? 'fa-solid fa-star' }} mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                                    <h3 class="feature-title">{{ $card['title'] }}</h3>
                                    <p class="feature-text">{{ $card['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    <!-- Treatments Grid Section -->
    <section class="home-treatments-section">
        <div class="container custom-container">
            <div class="home-treatments-grid">
                <!-- Card 1: Check My Teeth -->
                <div class="home-treatment-card">
                    <span class="card-badge">Check My Teeth</span>
                    <h2 class="card-title">Routine Dental Check-ups & Diagnosis</h2>
                    <p class="card-desc">Comprehensive assessments to ensure your oral health is on track and prevent future issues.</p>
                    <ul class="card-list">
                        <li><i class="fa-solid fa-check"></i> Dental Check-up</li>
                        <li><i class="fa-solid fa-check"></i> Digital X-Rays</li>
                        <li><i class="fa-solid fa-check"></i> Oral Health Assessment</li>
                        <li><i class="fa-solid fa-check"></i> Preventive Care</li>
                    </ul>
                    <a href="{{ route('treatments.check') }}" class="card-btn">
                        Book Check-up <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 2: Repair My Teeth -->
                <div class="home-treatment-card">
                    <span class="card-badge">Repair My Teeth</span>
                    <h2 class="card-title">Restore Damaged Teeth</h2>
                    <p class="card-desc">State-of-the-art restorative procedures to recover the function and structural integrity of your teeth.</p>
                    <ul class="card-list">
                        <li><i class="fa-solid fa-check"></i> Tooth Fillings</li>
                        <li><i class="fa-solid fa-check"></i> Root Canal Treatment</li>
                        <li><i class="fa-solid fa-check"></i> Crowns</li>
                        <li><i class="fa-solid fa-check"></i> Emergency Dental Care</li>
                    </ul>
                    <a href="{{ route('treatments.repair') }}" class="card-btn">
                        Repair My Teeth <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 3: Replace My Teeth -->
                <div class="home-treatment-card">
                    <span class="card-badge">Replace My Teeth</span>
                    <h2 class="card-title">Replace Missing Teeth</h2>
                    <p class="card-desc">Premium tooth replacement solutions designed to replicate natural teeth for lasting confidence.</p>
                    <ul class="card-list">
                        <li><i class="fa-solid fa-check"></i> Dental Implants</li>
                        <li><i class="fa-solid fa-check"></i> Dental Bridges</li>
                        <li><i class="fa-solid fa-check"></i> Dentures</li>
                        <li><i class="fa-solid fa-check"></i> Implant Consultation</li>
                    </ul>
                    <a href="{{ route('treatments.replace') }}" class="card-btn">
                        Replace My Teeth <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 4: Enhance My Teeth -->
                <div class="home-treatment-card">
                    <span class="card-badge">Enhance My Teeth</span>
                    <h2 class="card-title">Create Your Perfect Smile</h2>
                    <p class="card-desc">Bespoke cosmetic options designed to beautify, brighten, and perfect your natural smile.</p>
                    <ul class="card-list">
                        <li><i class="fa-solid fa-check"></i> Teeth Whitening</li>
                        <li><i class="fa-solid fa-check"></i> Invisalign</li>
                        <li><i class="fa-solid fa-check"></i> Veneers</li>
                        <li><i class="fa-solid fa-check"></i> Smile Makeover</li>
                    </ul>
                    <a href="{{ route('treatments.enhance') }}" class="card-btn">
                        Enhance My Smile <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Card 5: Facial Aesthetics -->
                <div class="home-treatment-card">
                    <span class="card-badge">Facial Aesthetics</span>
                    <h2 class="card-title">Refresh Your Natural Appearance</h2>
                    <p class="card-desc">Non-surgical cosmetic facial procedures to rejuvenate, refresh, and enhance your features.</p>
                    <ul class="card-list">
                        <li><i class="fa-solid fa-check"></i> Anti-Wrinkle Treatment</li>
                        <li><i class="fa-solid fa-check"></i> Dermal Fillers</li>
                        <li><i class="fa-solid fa-check"></i> Lip Enhancement</li>
                        <li><i class="fa-solid fa-check"></i> Rejuvenation &amp; Skin Care</li>
                    </ul>
                    <a href="{{ route('treatments.facial') }}" class="card-btn">
                        Explore Aesthetics <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Smile Makeover & Emergency Section -->
    @if ($emergencySec)
        <section class="section-padding section-light-bg">
            <div class="container custom-container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <span class="hero-badge">{{ $emergencySec->subtitle ?? 'SMILE MAKEOVER' }}</span>
                        <h2 class="welcome-title">{{ $emergencySec->title ?? 'Transform Your Smile' }}</h2>
                        <p class="welcome-desc">{{ $emergencySec->content['makeover_desc'] ?? 'Our smile makeover treatments combine cosmetic dentistry techniques.' }}</p>
                        
                        @if (isset($emergencySec->content['makeover_pills']))
                            <div class="row g-3 mb-4">
                                @foreach ($emergencySec->content['makeover_pills'] as $pill)
                                    <div class="col-6"><div class="makeover-pill"><i class="fa-solid fa-wand-magic-sparkles"></i> {{ $pill }}</div></div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="emergency-card">
                            <h3 class="mb-3 emergency-title"><i class="fa-solid fa-truck-medical"></i> {{ $emergencySec->content['emergency_title'] ?? 'Emergency Dentist in Wembley' }}</h3>
                            <p>{{ $emergencySec->content['emergency_desc'] ?? 'Dental emergencies can happen at any time. We provide same-day emergency appointments whenever possible for:' }}</p>
                            
                            @if (isset($emergencySec->content['emergency_badges']))
                                <div class="d-flex flex-wrap gap-2 mb-4">
                                    @foreach ($emergencySec->content['emergency_badges'] as $badge)
                                        <span class="emergency-badge">{{ $badge }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <a href="tel:{{ $phoneClean }}" class="btn-primary-custom emergency-btn">Call For Emergency Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- New Patient CTA Section -->
    @if ($newPatientSec)
        <section class="section-padding new-patient-section">
            <div class="container custom-container">
                <div class="row g-5 align-items-center new-patient-row">
                    <div class="col-lg-6">
                        <div class="new-patient-content">
                            <span class="hero-badge"><i class="fa-solid fa-user-plus me-2"></i> {{ $newPatientSec->subtitle ?? 'NEW PATIENTS' }}</span>
                            <h2 class="welcome-title text-start">{{ $newPatientSec->title ?? 'New Patients Welcome' }}</h2>
                            <p class="welcome-desc text-start" style="max-width: 100%;">{{ $newPatientSec->content['description'] ?? "Whether you're looking for a family dentist, cosmetic treatment, or emergency appointment, we're here to help." }}</p>
                            
                            @if (isset($newPatientSec->content['checklist']))
                                <ul class="new-patient-list text-start">
                                    @foreach ($newPatientSec->content['checklist'] as $item)
                                        <li>
                                            <span class="check-icon-wrapper"><i class="fa-solid fa-check"></i></span>
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            
                            <a href="{{ route('booking.create') }}" class="btn-primary-custom btn-lg mt-2"><i class="fa-regular fa-calendar"></i> Book Appointment</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="new-patient-img-wrapper">
                            <img src="{{ asset('assets/images/temp-img.jpeg') }}" class="new-patient-img" alt="New Patients Welcome">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-app-layout>
