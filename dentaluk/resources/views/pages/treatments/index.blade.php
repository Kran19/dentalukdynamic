<x-app-layout title="Icon Dental- Wembley | Treatments" description="From routine care to life-changing transformations, our treatments are designed around your needs, comfort, and goals.">
    <!-- Hero Section -->
    <section class="treatments-hero">
        <div class="container custom-container">
            
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span>Treatments</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="hero-label">OUR TREATMENTS</span>
                    <h2 class="hero-title">Advanced Dentistry.<br>Beautiful, Healthy Smiles.</h2>
                    <p class="hero-desc">From routine care to life-changing transformations, our treatments are designed around your needs, comfort, and goals.</p>
                    
                    <div class="hero-features">
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-solid fa-tooth"></i></div>
                            <div>
                                <h3 class="hf-title">Latest Technology</h3>
                                <p class="hf-desc">State-of-the-art equipment</p>
                            </div>
                        </div>
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-regular fa-heart"></i></div>
                            <div>
                                <h3 class="hf-title">Gentle & Comfortable</h3>
                                <p class="hf-desc">Pain-minimised treatments</p>
                            </div>
                        </div>
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-solid fa-notes-medical"></i></div>
                            <div>
                                <h3 class="hf-title">Personalised Care</h3>
                                <p class="hf-desc">Tailored treatment for every patient</p>
                            </div>
                        </div>
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-solid fa-shield-halved"></i></div>
                            <div>
                                <h3 class="hf-title">Trusted Experts</h3>
                                <p class="hf-desc">Highly experienced dental team</p>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#treatments" class="btn-primary-custom mt-2">
                        View All Treatments <i class="fa-solid fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper mt-5 mt-lg-0">
                        <img src="{{ asset('assets/images/stories/hero.png') }}" alt="Patient and Dentist">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Treatments Grid -->
    <section class="treatments-section" id="treatments">
        <div class="container custom-container">
            <div class="treatments-grid">
                <!-- Card 1 -->
                <div class="treatment-card">
                    <div class="t-img-container">
                        <img src="{{ asset('assets/images/checkmyteeth.png') }}" alt="General Dentistry">
                        <div class="t-icon-circle"><i class="fa-solid fa-tooth"></i></div>
                    </div>
                    <div class="t-content">
                        <h3 class="t-title">Check My Teeth</h3>
                        <p class="t-desc">Keep your smile healthy with check-ups, cleans, fillings, crowns and more.</p>
                        <a href="{{ route('treatments.check') }}" class="t-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="treatment-card">
                    <div class="t-img-container">
                        <img src="{{ asset('assets/images/smile.jpeg') }}" alt="Smile Makeovers">
                        <div class="t-icon-circle"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                    </div>
                    <div class="t-content">
                        <h3 class="t-title">Repair My Teeth</h3>
                        <p class="t-desc">Transform your smile with whitening, veneers, bonding and complete makeovers.</p>
                        <a href="{{ route('treatments.repair') }}" class="t-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="treatment-card">
                    <div class="t-img-container">
                        <img src="{{ asset('assets/images/stories/priya_before.png') }}" alt="Invisalign">
                        <div class="t-icon-circle"><i class="fa-solid fa-teeth-open"></i></div>
                    </div>
                    <div class="t-content">
                        <h3 class="t-title">Enhance My Teeth</h3>
                        <p class="t-desc">Straighten your teeth discreetly with clear aligners for a confident smile, every day.</p>
                        <a href="{{ route('treatments.enhance') }}" class="t-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="treatment-card">
                    <div class="t-img-container">
                        <img src="{{ asset('assets/images/implant.png') }}" alt="Dental Implants">
                        <div class="t-icon-circle"><i class="fa-solid fa-tooth"></i></div>
                    </div>
                    <div class="t-content">
                        <h3 class="t-title">Replace My Teeth</h3>
                        <p class="t-desc">Replace missing teeth with durable, natural-looking implant solutions.</p>
                        <a href="{{ route('treatments.replace') }}" class="t-link">Learn More <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="treatment-card">
                    <div class="t-img-container">
                        <img src="{{ asset('assets/images/Enhance.png') }}" alt="Facial Aesthetics">
                        <div class="t-icon-circle"><i class="fa-solid fa-border-all"></i></div>
                    </div>
                    <div class="t-content">
                        <h3 class="t-title">Facial Aesthetics</h3>
                        <p class="t-desc">Explore our full range of non-surgical aesthetic services tailored to you.</p>
                        <a href="{{ route('treatments.facial') }}" class="t-link">Explore Now <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Benefits Strip -->
            <div class="benefits-strip">
                <div class="benefits-group">
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-shield-halved"></i></div>
                        <div>
                            <h4 class="benefit-title">Minimal Discomfort</h4>
                            <p class="benefit-desc">Comfort-first approach in every treatment</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-pound-sign"></i></div>
                        <div>
                            <h4 class="benefit-title">Flexible Payment</h4>
                            <p class="benefit-desc">Interest-free options to suit your budget</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-solid fa-notes-medical"></i></div>
                        <div>
                            <h4 class="benefit-title">Emergency Care</h4>
                            <p class="benefit-desc">Same-day appointments when you need us</p>
                        </div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon"><i class="fa-regular fa-heart"></i></div>
                        <div>
                            <h4 class="benefit-title">Aftercare Support</h4>
                            <p class="benefit-desc">We're with you every step of your journey</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- CTA Section -->
            <div class="cta-banner mb-0">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Ready to start your smile journey?</h2>
                        <p class="cta-desc">Book your appointment online in just a few clicks.</p>
                    </div>
                </div>
                <div class="cta-actions">
                    <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                        <i class="fa-regular fa-calendar"></i> Book Online
                    </a>
                    <a href="tel:{{ config('clinic.phone_clean') }}" class="btn-outline-custom">
                        <i class="fa-solid fa-phone"></i> Call Us
                    </a>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
