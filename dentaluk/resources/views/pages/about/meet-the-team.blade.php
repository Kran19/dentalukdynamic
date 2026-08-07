<x-app-layout title="Icon Dental- Wembley | Meet The Team" description="Our experienced team combines clinical excellence with a gentle approach to provide exceptional dental care in a welcoming environment.">
    <style>
    .team-section-wrapper { margin-bottom: 80px; }
    .team-section-wrapper:last-of-type { margin-bottom: 0; }
    .team-card {
        cursor: pointer;
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        display: flex;
        flex-direction: column;
        height: 100%;
        border-radius: 20px !important;
    }
    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(177, 152, 111, 0.2);
        border-color: rgba(177, 152, 111, 0.4);
    }
    .team-card:active { transform: scale(0.98); }
    .team-card-img-wrapper {
        width: 100%;
        aspect-ratio: 4 / 5;
        overflow: hidden;
        position: relative;
        border-bottom: 1px solid rgba(177, 152, 111, 0.1);
        background-color: rgba(73, 87, 70, 0.1);
    }
    body.dark-theme .team-card-img-wrapper {
        border-bottom-color: rgba(255, 255, 255, 0.05);
        background-color: rgba(0, 0, 0, 0.2);
    }
    .team-card-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    }
    .team-card:hover .team-card-img { transform: scale(1.04); }
    .team-card-content {
        padding: 24px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }
    .team-name { font-size: 22px !important; font-weight: 600; margin-bottom: 6px !important; }
    .team-role { font-size: 14.5px !important; font-weight: 500; color: #b1986f; margin-bottom: 10px !important; }
    .team-desc { font-size: 13.5px !important; line-height: 1.6; margin-bottom: 20px !important; flex-grow: 1; }
    .team-learn-more {
        margin-top: auto;
        font-size: 14px;
        font-weight: 600;
        color: #b1986f;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: color 0.3s ease;
    }
    .team-card:hover .team-learn-more { color: #d6c09b; }
    .team-learn-more i { font-size: 12px; transition: transform 0.3s ease; }
    .team-card:hover .team-learn-more i { transform: translateX(4px); }

    /* Ultra-Luxury Dynamic Team Profile Modal */
    .team-modal {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        z-index: 10000; display: flex; align-items: center; justify-content: center;
        opacity: 0; visibility: hidden; transition: opacity 0.35s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.35s ease;
        padding: 20px;
    }
    .team-modal.active { opacity: 1; visibility: visible; }
    .team-modal-backdrop {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-color: rgba(10, 17, 12, 0.88); backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
    }
    .team-modal-content {
        position: relative;
        background: linear-gradient(150deg, #1f2e1e 0%, #121c11 100%);
        color: #ffffff;
        width: 100%; max-width: 520px; border-radius: 28px; padding: 40px 32px 36px;
        z-index: 10001;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.75), 0 0 50px rgba(177, 152, 111, 0.2);
        transform: scale(0.92) translateY(24px); transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.4s ease;
        border: 1px solid rgba(177, 152, 111, 0.25); opacity: 0;
    }
    .team-modal.active .team-modal-content { transform: scale(1) translateY(0); opacity: 1; }
    
    .team-modal-close {
        position: absolute; top: 20px; right: 20px;
        background: rgba(255, 255, 255, 0.08); border: 1px solid rgba(177, 152, 111, 0.25);
        color: #d6c09b; font-size: 16px; cursor: pointer; transition: all 0.3s ease;
        width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
    .team-modal-close:hover {
        background: #b1986f; color: #111a10; transform: rotate(90deg) scale(1.05); border-color: #b1986f;
    }

    .team-modal-body { display: flex; flex-direction: column; align-items: center; text-align: center; }
    
    .team-modal-image-container {
        width: 150px; height: 150px; margin-bottom: 22px; border-radius: 50%; overflow: hidden;
        border: 3px solid #b1986f;
        box-shadow: 0 0 0 4px rgba(177, 152, 111, 0.25), 0 12px 30px rgba(0, 0, 0, 0.5);
        background-color: #2a3729;
        position: relative;
    }
    .team-modal-img { width: 100%; height: 100%; object-fit: cover; }

    .team-modal-title {
        font-family: 'Cormorant Garamond', serif; font-size: 36px; font-weight: 700;
        color: #f3e8d3; margin-bottom: 8px; margin-top: 0; letter-spacing: 0.5px; line-height: 1.1;
    }

    .team-modal-role-badge {
        display: inline-block;
        font-family: 'Inter', sans-serif; font-size: 13px; font-weight: 600;
        color: #d6c09b; background: rgba(177, 152, 111, 0.15);
        border: 1px solid rgba(177, 152, 111, 0.35);
        padding: 5px 18px; border-radius: 20px; text-transform: uppercase; letter-spacing: 1px;
        margin-bottom: 6px;
    }

    .team-modal-gdc {
        font-family: 'Inter', sans-serif; font-size: 12px; color: rgba(255, 255, 255, 0.5);
        margin-bottom: 20px; letter-spacing: 1.5px; text-transform: uppercase; font-weight: 500;
    }

    /* Custom Sleek Gold Scrollbar for Bio */
    .team-modal-bio {
        overflow-y: auto; max-height: 160px; padding-right: 8px;
        font-family: 'Inter', sans-serif; font-size: 14.5px; line-height: 1.7;
        color: rgba(240, 245, 240, 0.88); margin-bottom: 26px; max-width: 440px; font-weight: 300;
        text-align: center;
    }
    .team-modal-bio::-webkit-scrollbar { width: 5px; }
    .team-modal-bio::-webkit-scrollbar-track { background: rgba(0, 0, 0, 0.2); border-radius: 10px; }
    .team-modal-bio::-webkit-scrollbar-thumb { background: rgba(177, 152, 111, 0.4); border-radius: 10px; }
    .team-modal-bio::-webkit-scrollbar-thumb:hover { background: rgba(214, 192, 155, 0.8); }

    .team-modal-footer { width: 100%; display: flex; justify-content: center; }
    .team-modal-btn {
        display: inline-flex; align-items: center; justify-content: center; gap: 10px;
        padding: 13px 38px; border-radius: 50px;
        background: linear-gradient(135deg, #b1986f 0%, #d6c09b 100%);
        color: #111a10; text-decoration: none !important; font-size: 14.5px; font-weight: 700;
        text-transform: uppercase; letter-spacing: 1px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        box-shadow: 0 8px 25px rgba(177, 152, 111, 0.35);
    }
    .team-modal-btn:hover {
        background: linear-gradient(135deg, #d6c09b 0%, #f3e8d3 100%);
        color: #111a10; transform: translateY(-3px) scale(1.02);
        box-shadow: 0 12px 32px rgba(177, 152, 111, 0.55);
    }
    </style>

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container custom-container">
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('about.index') }}">About</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span>Meet the Team</span>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5">
                    <span class="about-label">MEET THE TEAM</span>
                    <h2 class="about-title">The Friendly<br>Experts Behind<br>Your Smile</h2>
                    <p class="about-desc">Our experienced team combines clinical excellence with a gentle approach to provide exceptional dental care in a welcoming environment.</p>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('assets/images/team.png') }}" alt="Dental Clinic Team" class="about-image img-light">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section-padding pt-0">
        <div class="container custom-container">
            
            @php
                $sections = [
                    'Management' => $management,
                    'Dentists' => $dentists,
                    'Dental Hygienists' => $hygienists,
                    'Dental Nurses' => $nurses,
                    'Front of House' => $frontOfHouse,
                ];
            @endphp

            @foreach ($sections as $sectionTitle => $members)
                @if($members->count() > 0)
                <div class="team-section-wrapper">
                    <div class="explore-heading-wrapper">
                        <div class="heading-line"></div>
                        <h2 class="explore-heading">{{ $sectionTitle }}</h2>
                        <div class="heading-line"></div>
                    </div>
                    <div class="team-grid">
                        @foreach ($members as $member)
                            <div class="team-card" 
                                 data-name="{{ $member->name }}" 
                                 data-role="{{ $member->role }}" 
                                 data-gdc="{{ $member->gdc_number }}" 
                                 data-image="{{ asset($member->image_path) }}" 
                                 data-bio="{{ $member->bio }}">
                                <div class="team-card-img-wrapper">
                                    <img src="{{ asset($member->image_path) }}" 
                                         onerror="this.src='{{ asset('assets/images/team/michael.png') }}'" 
                                         alt="{{ $member->name }}" class="team-card-img">
                                </div>
                                <div class="team-card-content">
                                    <h3 class="team-name">{{ $member->name }}</h3>
                                    <div class="team-role">{{ $member->role }}</div>
                                    <p class="team-desc">{{ $member->gdc_number ?? '&nbsp;' }}</p>
                                    <div class="team-learn-more">Learn More <i class="fa-solid fa-arrow-right"></i></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach

            <!-- CTA Section -->
            <div class="cta-section">
                <div class="cta-left">
                    <div class="cta-icon"><i class="fa-regular fa-calendar"></i></div>
                    <div>
                        <h2 class="cta-heading">Book an appointment with our team</h2>
                        <p class="cta-text">We're here to help you achieve a healthy, confident smile.</p>
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

    <!-- Team Member Modal -->
    <div class="team-modal" id="teamModal">
        <div class="team-modal-backdrop" id="teamModalBackdrop"></div>
        <div class="team-modal-content">
            <button class="team-modal-close" id="teamModalClose" aria-label="Close modal"><i class="fa-solid fa-xmark"></i></button>
            <div class="team-modal-body">
                <div class="team-modal-image-container">
                    <img src="" alt="" id="teamModalImg" class="team-modal-img">
                </div>
                <h2 class="team-modal-title" id="teamModalTitle">Member Name</h2>
                <div class="team-modal-info">
                    <div class="team-modal-role-badge" id="teamModalRole">Role</div>
                    <p class="team-modal-gdc" id="teamModalGDC">GDC: 123456</p>
                    <p class="team-modal-bio" id="teamModalBio">Bio content here...</p>
                </div>
                <div class="team-modal-footer">
                    <a href="{{ route('booking.create') }}" class="team-modal-btn">
                        Book Online <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const teamCards = document.querySelectorAll('.team-card');
        const modal = document.getElementById('teamModal');
        const modalTitle = document.getElementById('teamModalTitle');
        const modalImg = document.getElementById('teamModalImg');
        const modalRole = document.getElementById('teamModalRole');
        const modalGDC = document.getElementById('teamModalGDC');
        const modalBio = document.getElementById('teamModalBio');
        const modalClose = document.getElementById('teamModalClose');
        const modalBackdrop = document.getElementById('teamModalBackdrop');

        teamCards.forEach(card => {
            card.addEventListener('click', function() {
                const name = this.getAttribute('data-name');
                const role = this.getAttribute('data-role');
                const gdc = this.getAttribute('data-gdc');
                const imgPath = this.getAttribute('data-image');
                const bio = this.getAttribute('data-bio');

                modalTitle.textContent = name;
                modalRole.textContent = role;
                
                if (gdc && gdc.trim() !== '') {
                    modalGDC.textContent = gdc.startsWith('GDC') ? gdc : 'GDC: ' + gdc;
                    modalGDC.style.display = 'block';
                } else {
                    modalGDC.style.display = 'none';
                }

                modalBio.textContent = bio || "A dedicated member of our team, committed to providing exceptional care and helping you achieve a healthy, confident smile.";
                modalImg.src = imgPath;

                modal.classList.add('active');
            });
        });

        function closeModal() { modal.classList.remove('active'); }
        if (modalClose) modalClose.addEventListener('click', closeModal);
        if (modalBackdrop) modalBackdrop.addEventListener('click', closeModal);
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('active')) closeModal();
        });
    });
    </script>
</x-app-layout>
