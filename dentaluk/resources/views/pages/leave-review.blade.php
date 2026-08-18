<x-app-layout title="Leave Us a Review | Icon Dental Wembley" description="We value your feedback. Share your experience at Icon Dental Wembley with others.">
    <style>
    .review-hero {
        padding: 100px 0 80px;
        background: linear-gradient(135deg, rgba(63, 75, 61, 0.04), rgba(177, 152, 111, 0.06));
        border-bottom: 1px solid rgba(177, 152, 111, 0.15);
        text-align: center;
    }
    body.dark-theme .review-hero {
        background: linear-gradient(135deg, rgba(23, 32, 22, 0.6), rgba(177, 152, 111, 0.03));
    }
    .review-hero-title {
        font-family: var(--heading-font);
        font-size: 52px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    body.dark-theme .review-hero-title { color: #ffffff; }
    .review-hero-subtitle {
        font-size: 17px;
        color: var(--text-gray);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    body.dark-theme .review-hero-subtitle { color: rgba(255, 255, 255, 0.7); }
    
    .review-content-section { padding: 90px 0; }
    
    .review-platform-card {
        background: #ffffff;
        border: 1px solid rgba(177, 152, 111, 0.25);
        border-radius: 20px;
        padding: 50px 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        text-align: center;
        max-width: 600px;
        margin: 0 auto;
    }
    body.dark-theme .review-platform-card {
        background: #233222;
        border-color: rgba(177, 152, 111, 0.2);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }
    .review-platform-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(177, 152, 111, 0.15);
        border-color: var(--gold);
    }
    .platform-icon {
        width: 80px;
        height: 80px;
        background: rgba(177, 152, 111, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 36px;
        color: var(--gold);
    }
    .platform-title {
        font-family: var(--heading-font);
        font-size: 28px;
        color: var(--text-dark);
        margin-bottom: 15px;
    }
    body.dark-theme .platform-title { color: #fff; }
    .platform-desc {
        color: var(--text-gray);
        font-size: 16px;
        margin-bottom: 30px;
        line-height: 1.6;
    }
    body.dark-theme .platform-desc { color: rgba(255,255,255,0.7); }
    
    .btn-review-google {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: #4285F4;
        color: #fff;
        font-weight: 500;
        letter-spacing: 1px;
        padding: 16px 36px;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(66, 133, 244, 0.3);
    }
    .btn-review-google:hover {
        background: #3367d6;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(66, 133, 244, 0.4);
    }
    
    .direct-feedback {
        margin-top: 60px;
        text-align: center;
    }
    .direct-feedback p {
        color: var(--text-gray);
        margin-bottom: 15px;
    }
    body.dark-theme .direct-feedback p { color: rgba(255,255,255,0.6); }
    .direct-feedback-link {
        color: var(--gold);
        text-decoration: none;
        font-weight: 500;
        border-bottom: 1px solid transparent;
        transition: border-color 0.3s;
    }
    .direct-feedback-link:hover {
        border-color: var(--gold);
    }
    
    @media (max-width: 768px) {
        .review-hero { padding: 60px 0 40px; }
        .review-hero-title { font-size: 36px; }
        .review-platform-card { padding: 30px 20px; }
        .platform-icon { width: 60px; height: 60px; font-size: 28px; margin-bottom: 15px; }
        .platform-title { font-size: 24px; }
        .btn-review-google { width: 100%; justify-content: center; }
    }
    </style>

    <!-- Hero Section -->
    <section class="review-hero">
        <div class="container">
            <h1 class="review-hero-title">Leave Us a Review</h1>
            <p class="review-hero-subtitle">Your feedback means the world to us. It helps us continually improve and helps others make informed decisions about their dental care.</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="review-content-section">
        <div class="container">
            <div class="review-platform-card">
                <div class="platform-icon">
                    <i class="fa-brands fa-google"></i>
                </div>
                <h3 class="platform-title">Review us on Google</h3>
                <p class="platform-desc">The greatest compliment you can give us is a positive review. If you enjoyed your experience with our team, please take a moment to share it on Google.</p>
                <a href="{{ config('clinic.google_reviews_url') }}" target="_blank" rel="noopener noreferrer" class="btn-review-google">
                    <i class="fa-brands fa-google"></i> Write a Google Review
                </a>
            </div>
            
            <div class="direct-feedback">
                <p>Have private feedback or suggestions for our team?</p>
                <a href="{{ route('contact') }}" class="direct-feedback-link">Contact us directly <i class="fa-solid fa-arrow-right ms-1" style="font-size: 12px;"></i></a>
            </div>
        </div>
    </section>
</x-app-layout>
