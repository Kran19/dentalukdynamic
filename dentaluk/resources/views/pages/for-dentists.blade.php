<x-app-layout title="For Dentists - Icon Dental Wembley" description="Partner with Icon Dental Wembley for exceptional specialist patient care and simple referral pathways.">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container custom-container">
            <div class="breadcrumb-wrap mb-4">
                <a href="{{ route('home') }}">Home</a> <i class="fa-solid fa-chevron-right" style="font-size:10px; color:#64748b; margin:0 6px;"></i> <span>For Dentists</span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="hero-label">FOR DENTISTS</span>
                    <h2 class="hero-title">Partner With Us for<br>Exceptional Patient Care</h2>
                    <p class="hero-desc">We value strong relationships with our referring dentists and are committed to providing your patients with the highest standard of dental care.</p>
                    
                    <div class="hero-features">
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-solid fa-user-group"></i></div>
                            <div>
                                <div class="hf-title">Collaborative Care</div>
                                <p class="hf-desc">We keep you informed every step of the way.</p>
                            </div>
                        </div>
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-solid fa-shield-halved"></i></div>
                            <div>
                                <div class="hf-title">Trusted Expertise</div>
                                <p class="hf-desc">Specialist care using the latest technology.</p>
                            </div>
                        </div>
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-regular fa-heart"></i></div>
                            <div>
                                <div class="hf-title">Patient Focused</div>
                                <p class="hf-desc">Comfort, safety and outstanding outcomes.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('assets/images/partnerwithus.png') }}" alt="Professional healthcare" class="hero-image" style="object-position: 45% center;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Referral Process Section -->
    <section class="process-section">
        <div class="container custom-container">
            <div class="row g-4 align-items-stretch">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-card">
                        <div class="process-icon"><i class="fa-solid fa-user-group"></i></div>
                        <h3 class="process-title">1. Our Referral Team</h3>
                        <p class="process-text">A dedicated team is here to support you with any questions and ensure a smooth experience.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-card">
                        <div class="process-icon"><i class="fa-regular fa-calendar-check"></i></div>
                        <h3 class="process-title">2. Our Referral Process</h3>
                        <p class="process-text">Simple, efficient and transparent. We keep you updated at every stage of your patient's journey.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-card">
                        <div class="process-icon"><i class="fa-solid fa-file-signature"></i></div>
                        <h3 class="process-title">3. Referral Form</h3>
                        <p class="process-text">Submit your referral quickly and securely using our online referral form.</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="process-card">
                        <div class="process-icon"><i class="fa-solid fa-phone-volume"></i></div>
                        <h3 class="process-title">4. Contact Us</h3>
                        <p class="process-text">Get in touch with our team. We're always happy to help.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Refer Section -->
    <div class="container custom-container">
        <section class="why-refer-section">
            <div class="row align-items-center g-4">
                <div class="col-lg-4">
                    <h2 class="why-title">Why Refer To Icon Dental- <span class="why-title-highlight">Wembley?</span></h2>
                    <ul class="why-checklist">
                        <li><i class="fa-solid fa-check"></i> Specialist-led treatments and advanced technology</li>
                        <li><i class="fa-solid fa-check"></i> Comprehensive treatment planning and clear communication</li>
                        <li><i class="fa-solid fa-check"></i> Timely appointments and efficient turnaround</li>
                        <li><i class="fa-solid fa-check"></i> Detailed reports and ongoing care collaboration</li>
                        <li><i class="fa-solid fa-check"></i> A friendly, experienced and caring team</li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Modern dental surgery room" class="why-image">
                </div>
                <div class="col-lg-4">
                    <div class="cta-card">
                        <h3 class="cta-title">Refer a Patient Today</h3>
                        <p class="cta-text">We're here to provide the best possible care for your patients.</p>
                        <a href="{{ route('referral.create') }}" class="btn-primary-custom w-100 mb-3"><i class="fa-solid fa-file-lines"></i> Submit Referral</a>
                        <a href="tel:{{ config('clinic.phone_clean') }}" class="btn-outline-custom w-100"><i class="fa-solid fa-phone"></i> Call Us</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
