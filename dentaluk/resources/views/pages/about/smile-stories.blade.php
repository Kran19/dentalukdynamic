<x-app-layout title="Icon Dental- Wembley | Smile Stories" description="Discover how our patients transformed their oral health, confidence, and lives with personalised care at Icon Dental- Wembley.">
    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container custom-container">
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('about.index') }}">About</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span>Smile Stories</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="about-label">SMILE STORIES</span>
                    <h2 class="about-title">Real People.<br>Real Stories.<br>Beautiful Smiles.</h2>
                    <p class="about-desc">Every smile has a story. Discover how our patients transformed their oral health, confidence, and lives with personalised care at Icon Dental- Wembley.</p>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('assets/images/stories/hero.png') }}" alt="Happy Patient at Dental Clinic">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dynamic Transformations Section -->
    <section class="section-padding">
        <div class="container custom-container">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h2 class="section-title">Patient Transformations</h2>
            </div>

            <div class="transformation-grid">
                @forelse ($stories as $story)
                    <div class="trans-card">
                        <div class="trans-img-container">
                            <div class="trans-img-half">
                                <img src="{{ asset($story->before_image ?? 'assets/images/stories/sarah_before.png') }}" alt="Before">
                                <span class="trans-badge">Before</span>
                            </div>
                            <div class="trans-img-half">
                                <img src="{{ asset($story->after_image ?? 'assets/images/stories/sarah_after.png') }}" alt="After">
                                <span class="trans-badge">After</span>
                            </div>
                        </div>
                        <div class="trans-content">
                            <div class="trans-category">{{ $story->category }}</div>
                            <h3 class="trans-title">{{ $story->quote }}</h3>
                            <p class="trans-desc">{{ $story->story_body }}</p>
                            <div class="patient-info">
                                <img src="{{ asset($story->avatar_image ?? 'assets/images/stories/avatar_sarah.png') }}" alt="{{ $story->patient_name }}" class="patient-avatar">
                                <div class="patient-details">
                                    <div class="patient-name">{{ $story->patient_name }}</div>
                                    <div class="patient-location"><i class="fa-solid fa-location-dot"></i> {{ $story->location }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <p class="text-muted">No patient smile stories available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>
