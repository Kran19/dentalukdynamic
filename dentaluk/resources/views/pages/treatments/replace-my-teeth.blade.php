<x-app-layout title="Replace My Teeth | Icon Dental Wembley" description="State-of-the-art replacement options to restore confidence, speech, and biting function.">
    <section class="subpage-hero" style="padding: 100px 0 80px; background: linear-gradient(135deg, rgba(63,75,61,0.03), rgba(177,152,111,0.05)); border-bottom: 1px solid rgba(177,152,111,0.15);">
        <div class="container custom-container">
            <div class="breadcrumb-nav mb-4">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('treatments.index') }}">Treatments</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span style="color:#b1986f;">Replace My Teeth</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label" style="color: #b1986f; font-weight: 700; letter-spacing: 2px;">TOOTH REPLACEMENT</span>
                    <h1 class="hero-title" style="font-family: var(--heading-font); font-size: 48px; font-weight: 600;">Dental Implants & Full Smile Restorations</h1>
                    <p class="hero-desc" style="font-size: 16px; color: var(--text-gray); line-height: 1.6;">Reclaim complete confidence, speech, and biting function with advanced dental implant solutions, custom bridges, and lightweight dentures crafted for natural aesthetics.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                            <i class="fa-regular fa-calendar-check me-2"></i> Book Implant Consultation
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-4 mt-lg-0" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(177,152,111,0.25);">
                        <img src="{{ asset('assets/images/implant.png') }}" alt="Dental Implant Treatment" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container custom-container">
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-md-4" id="implants">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-screwdriver-wrench mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Dental Implants</h3>
                        <p style="text-align: center !important;">Titanium posts anchored into the jawbone serving as permanent roots to support realistic crowns.</p>
                    </div>
                </div>
                <div class="col-md-4" id="dentures">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-tooth mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Complete & Partial Dentures</h3>
                        <p style="text-align: center !important;">Comfortable, custom-made removable appliances designed to fit snugly and restore your smile.</p>
                    </div>
                </div>
                <div class="col-md-4" id="full-reconstruction">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-wand-magic-sparkles mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Full Smile Restoration</h3>
                        <p style="text-align: center !important;">Comprehensive rehabilitation combining implants, bridges, and ceramic work for total oral renewal.</p>
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
                                <img src="{{ asset('assets/images/replace-before.jpeg') }}" alt="Before Dental Implants">
                                <span class="trans-badge">Before</span>
                            </div>
                            <div class="trans-img-half">
                                <img src="{{ asset('assets/images/replace-after.jpeg') }}" alt="After Dental Implants">
                                <span class="trans-badge">After</span>
                            </div>
                        </div>
                        <div class="trans-content">
                            <div class="trans-category">DENTAL IMPLANTS</div>
                            <h3 class="trans-title">A Complete Transformation</h3>
                            <p class="trans-desc">Missing teeth were replaced with permanent dental implants, restoring full biting function and natural aesthetics.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cta-banner mt-5">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Ready to replace missing teeth permanently?</h2>
                        <p class="cta-desc">Book your consultation with Dr. Kishan Sheth and our implant specialists.</p>
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
