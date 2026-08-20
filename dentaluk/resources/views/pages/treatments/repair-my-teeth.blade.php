<x-app-layout title="Repair My Teeth | Icon Dental Wembley" description="Restorative dentistry to fix damage, treat decay, and rebuild structural tooth integrity.">
    <section class="subpage-hero" style="padding: 100px 0 80px; background: linear-gradient(135deg, rgba(63,75,61,0.03), rgba(177,152,111,0.05)); border-bottom: 1px solid rgba(177,152,111,0.15);">
        <div class="container custom-container">
            <div class="breadcrumb-nav mb-4">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('treatments.index') }}">Treatments</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span style="color:#b1986f;">Repair My Teeth</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label" style="color: #b1986f; font-weight: 700; letter-spacing: 2px;">RESTORATIVE DENTISTRY</span>
                    <h1 class="hero-title" style="font-family: var(--heading-font); font-size: 48px; font-weight: 600;">Restore Damaged & Decayed Teeth</h1>
                    <p class="hero-desc" style="font-size: 16px; color: var(--text-gray); line-height: 1.6;">Rebuild structural integrity, eliminate dental pain, and restore your natural smile aesthetics with advanced fillings, root canal therapy, crowns, and bridges.</p>

                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                            <i class="fa-regular fa-calendar-check me-2"></i> Book Consultation
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-4 mt-lg-0" style="border-radius: 20px; overflow: hidden; border: 1px solid rgba(177,152,111,0.25);">
                        <img src="{{ asset('assets/images/smile.jpeg') }}" alt="Restorative Dental Treatment" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Sections -->
    <section class="section-padding">
        <div class="container custom-container">
            <div class="row g-4 justify-content-center mb-5">
                <div class="col-md-6 col-lg-3" id="fillings">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-tooth mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Tooth Fillings</h3>
                        <p style="text-align: center !important;">Natural composite resin fillings to seamlessly repair minor cavities and cracked enamel.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="root-canal">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-stethoscope mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Root Canal Therapy</h3>
                        <p style="text-align: center !important;">Pain-relieving treatment to save infected or severely damaged inner tooth pulp.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="crowns">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-crown mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Dental Crowns</h3>
                        <p style="text-align: center !important;">Bespoke ceramic or porcelain caps that encase fragile teeth to restore strength.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" id="bridges">
                    <div class="why-choose-card text-center p-4">
                        <i class="fa-solid fa-bridge mb-3" style="font-size: 32px; color: var(--primary-blue);"></i>
                        <h3>Dental Bridges</h3>
                        <p style="text-align: center !important;">Custom restorations anchored to adjacent teeth to fill gaps seamlessly.</p>
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
                                <img src="{{ asset('assets/images/teethbeforedada.jpeg') }}" alt="Before Tooth Repair" style="object-position: bottom;">
                                <span class="trans-badge">Before</span>
                            </div>
                            <div class="trans-img-half">
                                <img src="{{ asset('assets/images/dada-after.jpeg') }}" alt="After Tooth Repair" style="object-position: bottom;">
                                <span class="trans-badge">After</span>
                            </div>
                        </div>
                        <div class="trans-content">
                            <div class="trans-category">TOOTH REPAIR & RESTORATION</div>
                            <h3 class="trans-title">Restoring Function and Form</h3>
                            <p class="trans-desc">Damaged teeth were successfully repaired with custom restorations, bringing back natural strength and a seamless look.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cta-banner mt-5">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Rebuild your smile's strength & beauty</h2>
                        <p class="cta-desc">Schedule a restorative dental assessment with our experienced Wembley dentists.</p>
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
