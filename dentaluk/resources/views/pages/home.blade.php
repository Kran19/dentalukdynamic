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
    <style>
        /* Light Mode Colors (Default) */
        .hero-bg-custom {
            background-color: #fdfaf5; 
            background-image: radial-gradient(circle at 20% 0%, rgba(255,255,255,0.8) 0%, transparent 50%), radial-gradient(circle at 80% 0%, rgba(255,255,255,0.8) 0%, transparent 50%);
        }
        .hero-crest-line { background-color: #2C3E2E; opacity: 0.3; }
        .light-mode-logo { display: inline-block; mix-blend-mode: multiply; filter: none; }
        .dark-mode-logo { display: none; }
        .hero-title-custom { color: #2C3E2E; }
        .hero-subtitle-custom { color: #B39B71; }
        .hero-subtitle-line { background-color: #B39B71; }
        .hero-main-text { color: #2C3E2E; }
        .hero-desc-custom { color: #555; }
        
        /* Dark Mode Overrides */
        body.dark-theme .hero-bg-custom {
            background-color: transparent;
            background-image: radial-gradient(circle at 20% 0%, rgba(179, 155, 113, 0.05) 0%, transparent 50%), radial-gradient(circle at 80% 0%, rgba(179, 155, 113, 0.05) 0%, transparent 50%);
        }
        body.dark-theme .hero-crest-line { background-color: #ffffff; opacity: 0.2; }
        body.dark-theme .light-mode-logo { display: none; }
        body.dark-theme .dark-mode-logo { display: inline-block; mix-blend-mode: screen; filter: none; }
        body.dark-theme .hero-title-custom { color: #ffffff; }
        body.dark-theme .hero-subtitle-custom { color: #B39B71; }
        body.dark-theme .hero-subtitle-line { background-color: #B39B71; }
        body.dark-theme .hero-main-text { color: #ffffff; }
        body.dark-theme .hero-desc-custom { color: rgba(255, 255, 255, 0.75); }
    </style>

    <!-- Hero Section -->
    <section class="hero-section hero-bg-custom text-center position-relative" style="padding: 30px 0 30px 0; overflow: hidden;">
        <!-- Optional subtle wave decoration via CSS if desired, here just using the soft background -->
        <div class="container custom-container position-relative" style="z-index: 2;">
            
            <!-- Logo Crest with horizontal lines -->
            <div class="d-flex justify-content-center align-items-center" style="gap: 20px; margin-bottom: 20px; animation: fadeInUp 0.8s ease-out 0.1s backwards;">
                <div class="hero-crest-line" style="height: 1px; width: 120px;"></div>
                <img src="{{ asset('assets/images/logohero.png') }}" alt="Icon Dental Crest" class="light-mode-logo" style="height: 100px; width: auto; margin-top: -20px; margin-bottom: -5px;">
                <img src="{{ asset('assets/images/herodarklogo.png') }}" alt="Icon Dental Crest" class="dark-mode-logo" style="height: 100px; width: auto; margin-top: -20px; margin-bottom: -5px;">
                <div class="hero-crest-line" style="height: 1px; width: 120px;"></div>
            </div>

            <!-- Title -->
            <h1 class="hero-title-custom" style="font-family: 'Cormorant Garamond', serif; font-size: clamp(3rem, 6vw, 6rem); font-weight: 500; text-transform: uppercase; line-height: 1.0; margin-bottom: 10px; letter-spacing: 2px; animation: fadeInUp 0.8s ease-out 0.3s backwards;">
                ICON DENTAL<br>WEMBLEY
            </h1>

            <!-- Subtitle -->
            <div style="margin-bottom: 15px; animation: fadeInUp 0.8s ease-out 0.5s backwards;">
                <span class="hero-subtitle-custom" style="font-size: 1.1rem; letter-spacing: 5px; font-weight: 600; text-transform: uppercase;">
                    {{ $heroSec->subtitle ?? 'NHS & PRIVATE DENTISTRY' }}
                </span>
                <div class="hero-subtitle-line" style="height: 1.5px; width: 40px; margin: 10px auto 0;"></div>
            </div>

            <!-- Main Text -->
            <h3 class="hero-main-text" style="font-family: 'Cormorant Garamond', serif; font-size: 2.2rem; font-weight: 500; margin-bottom: 15px; animation: fadeInUp 0.8s ease-out 0.7s backwards;">
                {!! e(str_replace("\n", " ", $heroSec->title ?? "Enhance Your Smile. Enhance Your Confidence.")) !!}
            </h3>

            <div style="animation: fadeInUp 0.8s ease-out 0.9s backwards;">
                <p class="hero-desc-custom" style="font-size: 1.1rem; max-width: 900px; margin: 0 auto 20px auto; line-height: 1.6; text-align: center;">
                    {!! str_replace('environment where ', 'environment where <br>', e($heroSec->content['description'] ?? 'Experience modern dentistry in a comfortable, welcoming environment where your smile comes first. We combine advanced technology with a gentle touch to deliver exceptional results.')) !!}
                </p>

                <!-- Buttons -->
                <div class="d-flex justify-content-center gap-3 hero-actions flex-wrap">
                    <a href="{{ url($heroSec->content['primary_btn_url'] ?? '/book-online') }}" class="btn-primary-custom px-4 py-2 m-0" style="font-size: 15px;">
                        <i class="fa-regular fa-calendar-check"></i> {{ $heroSec->content['primary_btn_text'] ?? 'Book Consultation' }}
                    </a>
                    <a href="{{ url($heroSec->content['secondary_btn_url'] ?? '/treatments') }}" class="btn-outline-custom px-4 py-2 m-0" style="font-size: 15px; background-color: transparent;">
                        {{ $heroSec->content['secondary_btn_text'] ?? 'Learn More' }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
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
                            <i class="fa-regular fa-calendar-check"></i> Book  Now
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
                        <p class="welcome-desc" style="text-align-last: left;">{{ $emergencySec->content['makeover_desc'] ?? 'Our smile makeover treatments combine cosmetic dentistry techniques.' }}</p>
                        
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
                                <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
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
                            <p class="welcome-desc text-start" style="max-width: 100%; text-align-last: left;">{{ $newPatientSec->content['description'] ?? "Whether you're looking for a family dentist, cosmetic treatment, or emergency appointment, we're here to help." }}</p>
                            
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
                        <div class="new-patient-img-wrapper" style="height: auto;">
                            <img src="{{ asset('assets/images/newsection.png') }}" class="new-patient-img" alt="New Patients Welcome" style="height: auto; width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-app-layout>
