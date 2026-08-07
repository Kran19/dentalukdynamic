<x-app-layout title="General Dentistry | Icon Dental Wembley" description="Keep your smile healthy with routine check-ups, cleanings, fillings, and family dental care.">
    <section class="subpage-hero" style="padding: 100px 0 80px; background: linear-gradient(135deg, rgba(63,75,61,0.03), rgba(177,152,111,0.05)); border-bottom: 1px solid rgba(177,152,111,0.15);">
        <div class="container custom-container">
            <div class="breadcrumb-nav mb-4">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('treatments.index') }}">Treatments</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span style="color:#b1986f;">General Dentistry</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label" style="color: #b1986f; font-weight: 700; letter-spacing: 2px;">FAMILY & GENERAL DENTISTRY</span>
                    <h1 class="hero-title" style="font-family: var(--heading-font); font-size: 48px; font-weight: 600;">Comprehensive Family Dental Care</h1>
                    <p class="hero-desc" style="font-size: 16px; color: var(--text-gray); line-height: 1.6;">From routine examinations to preventive cleans, our caring team provides complete dental services for patients of all ages.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                            <i class="fa-regular fa-calendar-check me-2"></i> Book Appointment
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-4 mt-lg-0" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(177,152,111,0.25);">
                        <img src="{{ asset('assets/images/general.png') }}" alt="General Dentistry" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
