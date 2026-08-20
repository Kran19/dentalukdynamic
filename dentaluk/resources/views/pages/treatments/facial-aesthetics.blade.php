<x-app-layout title="Facial Aesthetics | Icon Dental Wembley" description="Non-surgical cosmetic procedures to enhance skin tone and refresh natural youthfulness.">
    <section class="subpage-hero" style="padding: 100px 0 80px; background: linear-gradient(135deg, rgba(63,75,61,0.03), rgba(177,152,111,0.05)); border-bottom: 1px solid rgba(177,152,111,0.15);">
        <div class="container custom-container">
            <div class="breadcrumb-nav mb-4">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('treatments.index') }}">Treatments</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span style="color:#b1986f;">Facial Aesthetics</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label" style="color: #b1986f; font-weight: 700; letter-spacing: 2px;">NON-SURGICAL COSMETICS</span>
                    <h1 class="hero-title" style="font-family: var(--heading-font); font-size: 48px; font-weight: 600;">Facial Aesthetics & Rejuvenation</h1>
                    <p class="hero-desc" style="font-size: 16px; color: var(--text-gray); line-height: 1.6;">Rejuvenate your skin, soften expression lines, and enhance facial contours with medically supervised anti-wrinkle injections and premium dermal fillers.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                            <i class="fa-regular fa-calendar-check me-2"></i> Book Aesthetics Consultation
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-4 mt-lg-0" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(177,152,111,0.25);">
                        <img src="{{ asset('assets/images/clinic room 2.png') }}" alt="Facial Aesthetics Room" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container custom-container">
                        <div class="row g-4 justify-content-center mb-5">
                @if(isset($category) && $category->treatments)
                @foreach($category->treatments->where('is_published', true) as $treatment)
                <div class="col-md-6 col-lg-3" id="treatment-{{ $treatment->id }}">
                    <div class="why-choose-card text-center p-4">
                        <i class="{{ $treatment->icon_class }} mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>{{ $treatment->name }}</h3>
                        <p>{{ $treatment->short_desc }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>

            <div class="cta-banner mt-5">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Refresh your natural beauty safely</h2>
                        <p class="cta-desc">Book your confidential facial aesthetics consultation today.</p>
                    </div>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                        <i class="fa-regular fa-calendar"></i> Book Online
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
