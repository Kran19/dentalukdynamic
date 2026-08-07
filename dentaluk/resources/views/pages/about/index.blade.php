<x-app-layout title="Icon Dental- Wembley | About Us" description="At Icon Dental- Wembley, we combine advanced technology with a personalised approach to deliver outstanding dental care for the whole family.">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container custom-container">
            
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span>About</span>
            </div>

            <div class="row">
                <div class="col-lg-6 pe-lg-5">
                    <span class="about-label">ICON DENTAL Wembley</span>
                    <h2 class="about-title">Exceptional Dental Care for Healthier, Happier, Smiles.</h2>
                    <p class="about-desc" style="text-align: justify;">At Icon Dental- Wembley, we combine advanced technology with a personalised approach to deliver outstanding dental care for the whole family. Your comfort, health, and confidence are always our priority.</p>
                    
                    <div class="hero-features">
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-solid fa-tooth"></i></div>
                            <div>
                                <h3 class="hf-title">State-of-the-Art Technology</h3>
                                <p class="hf-desc">Advanced tools for precise diagnosis and treatment.</p>
                            </div>
                        </div>
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-solid fa-users"></i></div>
                            <div>
                                <h3 class="hf-title">Experienced Professionals</h3>
                                <p class="hf-desc">Highly skilled team dedicated to your care.</p>
                            </div>
                        </div>
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-regular fa-heart"></i></div>
                            <div>
                                <h3 class="hf-title">Patient-Centred Approach</h3>
                                <p class="hf-desc">We listen, we care, and we put you first.</p>
                            </div>
                        </div>
                        <div class="hf-card">
                            <div class="hf-icon"><i class="fa-solid fa-shield-halved"></i></div>
                            <div>
                                <h3 class="hf-title">Trusted by Our Community</h3>
                                <p class="hf-desc">Proudly serving Wembley and surrounding areas.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('assets/images/reception.png') }}" alt="Luxury Dental Clinic Reception">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section>
        <div class="container custom-container">
            <div class="about-feature-grid">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-tooth"></i>
                    </div>
                    <h3 class="feature-title">Experienced Team</h3>
                    <p class="feature-desc">Highly skilled dentists with years of expertise across all areas of dental care.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-laptop-medical"></i>
                    </div>
                    <h3 class="feature-title">Advanced Technology</h3>
                    <p class="feature-desc">We use the latest dental technology for precise diagnosis and treatments.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-regular fa-heart"></i>
                    </div>
                    <h3 class="feature-title">Patient Focused</h3>
                    <p class="feature-desc">Your comfort, health, and goals are always our top priority.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h3 class="feature-title">Honest & Transparent</h3>
                    <p class="feature-desc">Open communication and clear pricing with no hidden surprises.</p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-regular fa-calendar"></i>
                    </div>
                    <h3 class="feature-title">Convenient Care</h3>
                    <p class="feature-desc">Flexible appointments and a welcoming environment for the whole family.</p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fa-regular fa-face-smile"></i>
                    </div>
                    <h3 class="feature-title">Beautiful Results</h3>
                    <p class="feature-desc">We are dedicated to delivering healthy, natural looking smiles that last.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Values + Mission Section -->
    <section class="values-section">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-6 pe-lg-5" style="padding:21px;">
                    <h2 class="section-heading">Our Values</h2>
                    <div class="values-grid">
                        <div class="value-card">
                            <div class="value-icon"><i class="fa-solid fa-tooth"></i></div>
                            <div>
                                <h3 class="value-title">Integrity</h3>
                                <p class="value-desc">We believe in honesty, transparency, & ethical care in everything we do.</p>
                            </div>
                        </div>
                        <div class="value-card">
                            <div class="value-icon"><i class="fa-regular fa-star"></i></div>
                            <div>
                                <h3 class="value-title">Excellence</h3>
                                <p class="value-desc">We are committed to providing the highest standard of dental care.</p>
                            </div>
                        </div>
                        <div class="value-card">
                            <div class="value-icon"><i class="fa-solid fa-users"></i></div>
                            <div>
                                <h3 class="value-title">Compassion</h3>
                                <p class="value-desc">We treat every patient with kindness, respect and empathy.</p>
                            </div>
                        </div>
                        <div class="value-card">
                            <div class="value-icon"><i class="fa-solid fa-microscope"></i></div>
                            <div>
                                <h3 class="value-title">Innovation</h3>
                                <p class="value-desc">We embrace the latest technology & techniques for better outcomes.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mission-card">
                        <div class="mission-content">
                            <h2 class="mission-heading">Our Mission</h2>
                            <p class="mission-desc">To provide exceptional dental care in a comfortable environment, helping our patients achieve long-term oral health and beautiful smiles.</p>
                            <a href="{{ route('about.team') }}" class="btn-primary-custom">
                                Meet The Team <i class="fa-solid fa-users ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section>
        <div class="container custom-container">
            <div class="cta-banner">
                <div class="cta-left">
                    <div class="cta-icon-circle"><i class="fa-regular fa-calendar-check"></i></div>
                    <div>
                        <h2 class="cta-heading">Ready to take the next step towards a healthier smile?</h2>
                        <p class="cta-desc">Book your appointment online in just a few clicks.</p>
                    </div>
                </div>
                <div class="cta-right">
                    <a href="{{ route('booking.create') }}" class="btn-primary-custom">
                        <i class="fa-regular fa-calendar"></i> Book Online
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
