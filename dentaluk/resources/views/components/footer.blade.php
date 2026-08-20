@php
    date_default_timezone_set('Europe/London');
    $currentDay = date('N'); // 1 (Mon) to 7 (Sun)
    $currentHour = (int)date('G');
    $isOpen = false;

    if ($currentDay >= 1 && $currentDay <= 4) {
        if ($currentHour >= 9 && $currentHour < 17) $isOpen = true;
    } elseif ($currentDay == 5) {
        if ($currentHour >= 9 && $currentHour < 15) $isOpen = true;
    }

    $phone = \App\Models\Setting::get('phone', config('clinic.phone'));
    $phoneClean = \App\Models\Setting::get('phone_clean', config('clinic.phone_clean'));
    $email = \App\Models\Setting::get('email', config('clinic.email'));
    $address = \App\Models\Setting::get('address', config('clinic.address'));
    $mapLink = \App\Models\Setting::get('map_link', config('clinic.map_link'));
@endphp

<footer class="editorial-footer">
    <div class="footer-bg-text">ICON DENTAL</div>
    
    <div class="footer-container">
        
        <!-- Horizontal Top Bar -->
        <div class="footer-top-bar">
            <a href="{{ route('home') }}" class="footer-brand-logo">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="Icon Dental" class="logo-light" style="height: 140px;">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="Icon Dental" class="logo-dark" style="height: 140px;">
            </a>
            
            <div class="footer-contact-column" style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
                <div class="footer-contact-row" style="margin-bottom: 0;">
                    <a href="tel:{{ $phoneClean }}" class="footer-contact-item">
                        <i class="fa-solid fa-phone"></i>
                        <span>Tel: {{ $phone }}</span>
                    </a>
                    <a href="mailto:{{ $email }}" class="footer-contact-item">
                        <i class="fa-regular fa-envelope"></i>
                        <span>{{ $email }}</span>
                    </a>
                </div>
                <a href="{{ $mapLink }}" target="_blank" rel="noopener noreferrer" class="footer-contact-item" style="text-decoration: none;">
                    <i class="fa-solid fa-location-dot"></i>
                    <span>{{ $address }}</span>
                </a>
            </div>
        </div>

        <!-- Asymmetrical Content Grid -->
        <div class="footer-asymmetric-grid">
            
            <div class="footer-manifesto">
                <h3>Elevating the standard of modern dentistry.</h3>
                <p>We combine advanced technology with a premium patient experience. From routine care to complex cosmetic makeovers, we design smiles that exude health and confidence.</p>
                <a href="{{ route('leave-review') }}" class="footer-review-card">
                    <div class="frc-icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="frc-content">
                        <span class="frc-label">LEAVE US A REVIEW</span>
                        <span class="frc-sub">We'd love to hear about your experience at Icon Dental Wembley.</span>
                    </div>
                </a>
            </div>
            
            <div class="footer-links-col">
                <h4 class="footer-col-header">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}" class="footer-link-item">Home</a></li>
                    <li><a href="{{ route('about.index') }}" class="footer-link-item">About Us</a></li>
                    <li><a href="{{ route('about.team') }}" class="footer-link-item">Meet The Team</a></li>
                    <li><a href="{{ route('treatments.index') }}" class="footer-link-item">Treatments</a></li>
                    <li><a href="{{ route('fees') }}" class="footer-link-item">Fees &amp; Membership</a></li>
                    <li><a href="{{ route('dentists') }}" class="footer-link-item">For Dentists</a></li>
                    <li><a href="{{ route('contact') }}" class="footer-link-item">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="footer-hours-col">
                <h4 class="footer-col-header">Visiting Hours</h4>
                <ul class="footer-links" style="cursor: default; gap: 12px;">
                    @foreach (config('clinic.hours') as $days => $hours)
                        <li style="color: var(--footer-text-body); font-size: 15px; display: flex; flex-direction: column; padding-bottom: 8px;">
                            <span>{{ $days }}</span>
                            <span style="opacity: 0.8; margin-top: 2px;">{{ $hours }}</span>
                        </li>
                    @endforeach
                </ul>
                <div class="footer-status-tag {{ $isOpen ? 'status-open' : 'status-closed' }}">
                    <span class="status-pulse"></span>
                    <span>{{ $isOpen ? 'Clinic Open Today' : 'Clinic Closed' }}</span>
                </div>
            </div>
            
        </div>
        
        <!-- Legal & Compliance Links Bar -->
        <div class="pt-4 border-top border-secondary border-opacity-25 mt-4">
            <div class="d-flex flex-wrap justify-content-center gap-2 gap-md-4 text-secondary text-center" style="font-size: 13px;">
                <a href="{{ route('legal.complaints') }}" class="footer-link-item text-decoration-none">Complaints Policy</a>
                <span class="d-none d-md-inline">&bull;</span>
                <a href="{{ route('legal.data-protection') }}" class="footer-link-item text-decoration-none">Data Protection</a>
                <span class="d-none d-md-inline">&bull;</span>
                <a href="{{ route('legal.cookies') }}" class="footer-link-item text-decoration-none">Cookies Policy</a>
                <span class="d-none d-md-inline">&bull;</span>
                <a href="{{ route('legal.privacy') }}" class="footer-link-item text-decoration-none">Privacy Policy</a>
                <span class="d-none d-md-inline">&bull;</span>
                <a href="{{ route('legal.terms') }}" class="footer-link-item text-decoration-none">Terms of Use</a>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center pt-4 mt-2">
            <p class="mb-3 mb-md-0 text-secondary" style="font-size: 13px;">&copy; {{ date('Y') }} Icon Dental Wembley. All rights reserved. Designed for Excellence.</p>
            <div class="d-flex flex-wrap gap-4 align-items-center">
                <a href="{{ route('contact') }}" class="footer-link-item" style="font-size: 13px;">Contact Us</a>
                <a href="{{ route('booking.create') }}" class="footer-link-item" style="font-size: 13px;">Book Online</a>
                <a href="{{ route('admin.dashboard') }}" class="footer-link-item" style="font-size: 13px;">Admin Portal</a>
            </div>
        </div>

    </div>
</footer>

<!-- Reviews Carousel Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('testimonialTrack');
    if (!track) return;
    
    const items = track.querySelectorAll('.testimonial-item');
    const total = items.length;
    let current = 0;
    
    setInterval(() => {
        current = (current + 1) % total;
        track.style.transform = `translateX(-${current * 100}%)`;
    }, 6000);
});
</script>
