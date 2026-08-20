<x-app-layout title="Check My Teeth | Icon Dental Wembley" description="Routine examinations, advanced diagnostics, and preventive treatments for healthy teeth at Icon Dental Wembley.">
    <section class="subpage-hero" style="padding: 100px 0 80px; background: linear-gradient(135deg, rgba(63,75,61,0.03), rgba(177,152,111,0.05)); border-bottom: 1px solid rgba(177,152,111,0.15);">
        <div class="container custom-container">
            <div class="breadcrumb-nav mb-4">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('treatments.index') }}">Treatments</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span style="color:#b1986f;">Check My Teeth</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label" style="color: #b1986f; font-weight: 700; letter-spacing: 2px;">PREVENTIVE CARE & DIAGNOSTICS</span>
                    <h1 class="hero-title" style="font-family: var(--heading-font); font-size: 48px; font-weight: 600;">Routine Dental Care & Health Assessments</h1>
                    <p class="hero-desc" style="font-size: 16px; color: var(--text-gray); line-height: 1.6;">Maintain optimum oral health, prevent gum disease, and detect potential dental concerns early with comprehensive examinations and hygienist treatments.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                            <i class="fa-regular fa-calendar-check me-2"></i> Book Check-Up
                        </a>
                        <a href="#details" class="btn-outline-custom">
                            Explore Services <i class="fa-solid fa-arrow-down ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-4 mt-lg-0" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(177,152,111,0.25);">
                        <img src="{{ asset('assets/images/general.png') }}" alt="Dental Examination" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <section class="section-padding" id="details">
        <div class="container custom-container">
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-md-6 col-lg-3" id="checkup">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-clipboard-check mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Dental Check-up</h3>
                        <p style="text-align: center !important;">Comprehensive clinical assessment of teeth, gums, jaw joints, and oral soft tissues.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="hygiene">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-hands-bubbles mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Hygiene & Cleanings</h3>
                        <p style="text-align: center !important;">Professional scale and polish treatments to remove stubborn plaque, tartar, and surface stains.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="gum-health">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-shield-halved mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Gum Health Care</h3>
                        <p style="text-align: center !important;">Preventive therapies to treat gingivitis and manage periodontal conditions effectively.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="emergency">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-truck-medical mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Emergency Dentistry</h3>
                        <p style="text-align: center !important;">Prompt relief for dental pain, toothaches, swelling, and unexpected dental trauma.</p>
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
                                <img src="{{ asset('assets/images/before-dada.jpeg') }}" alt="Before Dental Hygiene">
                                <span class="trans-badge">Before</span>
                            </div>
                            <div class="trans-img-half">
                                <img src="{{ asset('assets/images/after-before2.jpeg') }}" alt="After Dental Hygiene">
                                <span class="trans-badge">After</span>
                            </div>
                        </div>
                        <div class="trans-content">
                            <div class="trans-category">HYGIENE & CLEANINGS</div>
                            <h3 class="trans-title">A Fresher, Healthier Smile</h3>
                            <p class="trans-desc">Professional deep cleaning and gum health therapy restored the natural brightness of our patient's teeth.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cta-banner mt-5">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Keep your teeth healthy and strong</h2>
                        <p class="cta-desc">Book your routine dental examination or hygiene appointment today.</p>
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
