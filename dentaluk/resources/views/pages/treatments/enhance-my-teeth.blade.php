<x-app-layout title="Enhance My Teeth | Icon Dental Wembley" description="Bespoke cosmetic options designed to beautify, brighten, and perfect your natural smile.">
    <section class="subpage-hero" style="padding: 100px 0 80px; background: linear-gradient(135deg, rgba(63,75,61,0.03), rgba(177,152,111,0.05)); border-bottom: 1px solid rgba(177,152,111,0.15);">
        <div class="container custom-container">
            <div class="breadcrumb-nav mb-4">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('treatments.index') }}">Treatments</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span style="color:#b1986f;">Enhance My Teeth</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label" style="color: #b1986f; font-weight: 700; letter-spacing: 2px;">COSMETIC DENTISTRY</span>
                    <h1 class="hero-title" style="font-family: var(--heading-font); font-size: 48px; font-weight: 600;">Invisalign, Whitening & Veneers</h1>
                    <p class="hero-desc" style="font-size: 16px; color: var(--text-gray); line-height: 1.6;">Elevate your smile with clear aligner orthodontics, professional tooth whitening, handcrafted porcelain veneers, and composite bonding.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                            <i class="fa-regular fa-calendar-check me-2"></i> Book Smile Consultation
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-4 mt-lg-0" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(177,152,111,0.25);">
                        <img src="{{ asset('assets/images/invisalign-treatment.jpg') }}" alt="Invisalign Treatment" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container custom-container">
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-md-6 col-lg-3" id="invisalign">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-teeth-open mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Invisalign® Aligners</h3>
                        <p>Discreet, clear aligners to align misaligned teeth without visible metal brackets.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="whitening">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-regular fa-sun mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Teeth Whitening</h3>
                        <p>Safe in-surgery and home whitening systems to lift stains and brighten enamel significantly.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="veneers">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-wand-magic-sparkles mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Porcelain Veneers</h3>
                        <p>Custom wafer-thin ceramic shells attached to the front of teeth for instant aesthetic symmetry.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="bonding">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-regular fa-face-smile mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Composite Bonding</h3>
                        <p>Artistic tooth-colored resin sculpting to smooth chips, close gaps, and reshape teeth.</p>
                    </div>
                </div>
            </div>

            <div class="cta-banner mt-5">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Transform your smile with cosmetic care</h2>
                        <p class="cta-desc">Book your aesthetic consultation online in just a few clicks.</p>
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
