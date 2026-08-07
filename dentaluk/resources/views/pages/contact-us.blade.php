<x-app-layout title="Contact Us | Icon Dental Wembley" description="We are here to answer your questions, discuss your treatment options, and welcome you to our modern Wembley clinic.">
    <style>
    .contact-hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, rgba(63, 75, 61, 0.04), rgba(177, 152, 111, 0.06));
        border-bottom: 1px solid rgba(177, 152, 111, 0.15);
        text-align: center;
    }
    body.dark-theme .contact-hero {
        background: linear-gradient(135deg, rgba(23, 32, 22, 0.6), rgba(177, 152, 111, 0.03));
    }
    .contact-hero-title {
        font-family: var(--heading-font);
        font-size: 52px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    body.dark-theme .contact-hero-title { color: #ffffff; }
    .contact-hero-subtitle {
        font-size: 17px;
        color: var(--text-gray);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    body.dark-theme .contact-hero-subtitle { color: rgba(255, 255, 255, 0.7); }
    .contact-content-section { padding: 90px 0; }
    .contact-info-card {
        background: #ffffff;
        border: 1px solid rgba(177, 152, 111, 0.25);
        border-radius: 20px;
        padding: 35px 30px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        margin-bottom: 30px;
    }
    body.dark-theme .contact-info-card {
        background: #233222;
        border-color: rgba(177, 152, 111, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }
    .contact-info-card:hover {
        transform: translateY(-5px);
        border-color: rgba(177, 152, 111, 0.6);
        box-shadow: 0 15px 35px rgba(177, 152, 111, 0.15);
    }
    .card-heading {
        font-family: var(--heading-font);
        font-size: 24px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 25px;
        display: flex; align-items: center; gap: 12px;
    }
    body.dark-theme .card-heading { color: #ffffff; }
    .card-heading i { color: #b1986f; }
    .contact-details-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 20px; }
    .contact-detail-item { display: flex; align-items: flex-start; gap: 15px; }
    .contact-icon-circle {
        width: 44px; height: 44px; border-radius: 50%;
        background: rgba(177, 152, 111, 0.1); border: 1px solid rgba(177, 152, 111, 0.25);
        display: flex; align-items: center; justify-content: center; color: #b1986f; font-size: 16px; flex-shrink: 0; transition: all 0.3s ease;
    }
    .contact-detail-item:hover .contact-icon-circle { background: #b1986f; color: #ffffff; }
    .contact-text-box h5 { font-size: 13px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #b1986f; margin: 0 0 4px; }
    .contact-text-box p, .contact-text-box a { font-size: 15px; color: var(--text-gray); line-height: 1.5; margin: 0; text-decoration: none !important; transition: color 0.3s ease; }
    body.dark-theme .contact-text-box p, body.dark-theme .contact-text-box a { color: rgba(255, 255, 255, 0.8); }
    .contact-text-box a:hover { color: #b1986f; }
    .contact-hours-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 14px; }
    .contact-hours-list li { display: flex; justify-content: space-between; align-items: center; font-size: 14.5px; color: var(--text-gray); padding-bottom: 8px; border-bottom: 1px dashed rgba(177, 152, 111, 0.15); }
    body.dark-theme .contact-hours-list li { color: rgba(255, 255, 255, 0.75); border-color: rgba(255, 255, 255, 0.08); }
    .contact-hours-list li:last-child { border-bottom: none; padding-bottom: 0; }
    .contact-hours-list li span:first-child { font-weight: 500; }
    .contact-hours-list li span:last-child { font-weight: 600; color: #b1986f; }
    .map-container { height: 100%; min-height: 480px; border-radius: 20px; overflow: hidden; border: 1px solid rgba(177, 152, 111, 0.25); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05); }
    .map-container iframe { width: 100%; height: 100%; min-height: 480px; border: 0; display: block; }
    .contact-cta-banner {
        padding: 70px 40px; background: linear-gradient(135deg, #5c6e5a, #3f4b3d);
        border-radius: 24px; border: 1px solid rgba(177, 152, 111, 0.35); color: #ffffff;
        display: flex; justify-content: space-between; align-items: center; gap: 30px; box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15); margin-bottom: 90px;
    }
    .contact-cta-left h3 { font-family: var(--heading-font); font-size: 32px; font-weight: 600; margin-bottom: 10px; }
    .contact-cta-left p { font-size: 16px; color: rgba(255, 255, 255, 0.85); margin: 0; }
    .btn-cta-luxury { background: #b1986f; color: #ffffff; border: 1px solid #b1986f; padding: 14px 32px; border-radius: 10px; font-size: 15px; font-weight: 600; text-decoration: none !important; display: inline-flex; align-items: center; gap: 8px; transition: all 0.3s ease; white-space: nowrap; }
    .btn-cta-luxury:hover { background: #9f875e; border-color: #9f875e; color: #ffffff; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(177, 152, 111, 0.4); }
    </style>

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container custom-container">
            <h1 class="contact-hero-title">Contact Us</h1>
            <p class="contact-hero-subtitle">We are here to answer your questions, discuss your treatment options, and welcome you to our modern Wembley clinic.</p>
        </div>
    </section>

    <!-- Contact Form / Info / Map Section -->
    <section class="contact-content-section">
        <div class="container custom-container">
            <div class="row g-5">
                <!-- Left Column: Details & Hours -->
                <div class="col-lg-6">
                    <!-- Contact Details Card -->
                    <div class="contact-info-card">
                        <h3 class="card-heading"><i class="fa-solid fa-address-book"></i> Contact Details</h3>
                        <ul class="contact-details-list">
                            <li class="contact-detail-item">
                                <div class="contact-icon-circle"><i class="fa-solid fa-location-dot"></i></div>
                                <div class="contact-text-box">
                                    <h5>Address</h5>
                                    <a href="{{ config('clinic.map_link') }}" target="_blank" rel="noopener noreferrer">
                                        {{ config('clinic.address') }}
                                    </a>
                                </div>
                            </li>
                            <li class="contact-detail-item">
                                <div class="contact-icon-circle"><i class="fa-solid fa-phone"></i></div>
                                <div class="contact-text-box">
                                    <h5>Phone Number</h5>
                                    <a href="tel:{{ config('clinic.phone_clean') }}">
                                        {{ config('clinic.phone') }}
                                    </a>
                                </div>
                            </li>
                            <li class="contact-detail-item">
                                <div class="contact-icon-circle"><i class="fa-solid fa-fax"></i></div>
                                <div class="contact-text-box">
                                    <h5>Fax</h5>
                                    <p>{{ config('clinic.fax') }}</p>
                                </div>
                            </li>
                            <li class="contact-detail-item">
                                <div class="contact-icon-circle"><i class="fa-regular fa-envelope"></i></div>
                                <div class="contact-text-box">
                                    <h5>Email Address</h5>
                                    <a href="mailto:{{ config('clinic.email') }}">
                                        {{ config('clinic.email') }}
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Opening Hours Card -->
                    <div class="contact-info-card">
                        <h3 class="card-heading"><i class="fa-regular fa-clock"></i> Opening Hours</h3>
                        <ul class="contact-hours-list">
                            @foreach (config('clinic.hours') as $days => $hours)
                                <li>
                                    <span>{{ $days }}</span>
                                    <span>{{ $hours }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Right Column: Map -->
                <div class="col-lg-6">
                    <div class="map-container">
                        <iframe 
                            src="{{ config('clinic.map_embed') }}" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Book Online Banner -->
    <section class="container custom-container">
        <div class="contact-cta-banner">
            <div class="contact-cta-left">
                <h3>Start Your Treatment Journey</h3>
                <p>Ready to book? Use our quick online portal to select your dentist and schedule your visit.</p>
            </div>
            <a href="{{ route('booking.create') }}" class="btn-cta-luxury">
                Book Online <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </section>
</x-app-layout>
