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
                <div class="col-md-6 col-lg-3" id="wrinkles">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-regular fa-face-smile mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Anti-Wrinkle Care</h3>
                        <p style="text-align: center !important;">Targeted treatments to relax facial muscles and smooth forehead lines and crow's feet.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="fillers">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-syringe mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Dermal Fillers</h3>
                        <p style="text-align: center !important;">Hyaluronic acid injections to restore lost volume, sculpt cheeks, and soften deep folds.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="lips">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-heart mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Lip Enhancement</h3>
                        <p style="text-align: center !important;">Subtle, natural lip volume, hydration, and symmetry enhancement tailored to your face.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="rejuvenation">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-wand-magic-sparkles mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Skin Rejuvenation</h3>
                        <p style="text-align: center !important;">Advanced medical skin therapies to improve texture, elasticity, and youthful radiance.</p>
                    </div>
                </div>
            </div>

            <!-- Patient Transformations -->
            <div class="mb-5">
                <h3 class="text-center mb-4" style="font-family: var(--heading-font); font-size: 36px;">Real Patient Results</h3>
                <div class="transformation-grid" style="grid-template-columns: 1fr; max-width: 600px; margin: 0 auto;">
                    <div class="trans-card">
                        <div class="trans-img-container">
                            <div class="trans-img-half">
                                <img src="{{ asset('assets/images/before-lips.jpeg') }}" alt="Before Facial Aesthetics">
                                <span class="trans-badge">Before</span>
                            </div>
                            <div class="trans-img-half">
                                <img src="{{ asset('assets/images/facial.jpeg') }}" alt="After Facial Aesthetics">
                                <span class="trans-badge">After</span>
                            </div>
                        </div>
                        <div class="trans-content">
                            <div class="trans-category">FACIAL AESTHETICS</div>
                            <h3 class="trans-title">Enhancing Natural Beauty</h3>
                            <p class="trans-desc">Subtle, non-surgical enhancements smoothed fine lines and added volume, creating a refreshed and youthful appearance.</p>
                        </div>
                    </div>
                </div>
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
