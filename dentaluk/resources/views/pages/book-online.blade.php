<x-app-layout title="Icon Dental- Wembley | Book Online" description="Fill in our quick online booking form to request an appointment with our expert dental team.">
    <section class="book-hero">
        <div class="container custom-container">
            
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span>Book Online</span>
            </div>

            <div class="book-grid">
                <!-- LEFT COLUMN -->
                <div class="book-left">
                    <span class="gold-pill">BOOK ONLINE</span>
                    
                    <h1 class="book-title">Book Your Appointment<br>With Ease</h1>
                    
                    <div class="gold-line"></div>
                    
                    <p class="book-desc">We're here to help you achieve a healthy, confident smile.<br>Fill in the form and our team will get back to you<br>to confirm your appointment.</p>
                    
                    <div class="feature-row">
                        <div class="feature-item">
                            <div class="feature-icon-wrapper">
                                <i class="fa-regular fa-calendar"></i>
                            </div>
                            <div>
                                <h3 class="feature-item-title">Easy Scheduling</h3>
                                <p class="feature-item-text">Choose a date and time that<br>works best for you.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon-wrapper">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <div>
                                <h3 class="feature-item-title">Quick Confirmation</h3>
                                <p class="feature-item-text">We'll confirm your appointment<br>as soon as possible.</p>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon-wrapper">
                                <i class="fa-solid fa-shield-halved"></i>
                            </div>
                            <div>
                                <h3 class="feature-item-title">Patient Care</h3>
                                <p class="feature-item-text">Your comfort and care<br>are our top priority.</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon">
                            <i class="fa-solid fa-phone-volume" style="transform: rotate(-30deg);"></i>
                        </div>
                        <div class="contact-card-text">
                            <span>Need Help?</span>
                            Call us on <a href="tel:{{ config('clinic.phone_clean') }}">{{ config('clinic.phone') }}</a>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN (FORM) -->
                <div class="book-right">
                    <div class="form-card">
                        <div class="form-header">
                            <i class="fa-regular fa-calendar form-header-icon"></i>
                            <h2 class="form-heading">Appointment Details</h2>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success border-0 rounded-4 p-4 mb-4" style="background: rgba(46, 125, 50, 0.1); border-left: 4px solid #2e7d32 !important;">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="fa-solid fa-circle-check fs-3 text-success"></i>
                                    <div>
                                        <h5 class="fw-bold mb-1 text-success">Appointment Request Received!</h5>
                                        <p class="mb-0 text-dark">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger border-0 rounded-4 p-3 mb-4">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('booking.store') }}" method="POST">
                            @csrf

                            <!-- Row 1 -->
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Full Name <span>*</span></label>
                                        <input type="text" name="full_name" class="form-control-custom @error('full_name') input-error @enderror" value="{{ old('full_name') }}" placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Email Address <span>*</span></label>
                                        <input type="email" name="email" class="form-control-custom @error('email') input-error @enderror" value="{{ old('email') }}" placeholder="Enter your email" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number <span>*</span></label>
                                        <input type="tel" name="phone" class="form-control-custom @error('phone') input-error @enderror" value="{{ old('phone') }}" placeholder="Enter your phone number" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Preferred Date <span>*</span></label>
                                        <input type="date" name="preferred_date" class="form-control-custom @error('preferred_date') input-error @enderror" value="{{ old('preferred_date') }}" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Preferred Time <span>*</span></label>
                                        <select name="preferred_time" class="form-control-custom @error('preferred_time') input-error @enderror" required>
                                            <option value="" disabled {{ old('preferred_time') ? '' : 'selected' }}>Select a time</option>
                                            <option value="morning" {{ old('preferred_time') == 'morning' ? 'selected' : '' }}>Morning (9am - 12pm)</option>
                                            <option value="afternoon" {{ old('preferred_time') == 'afternoon' ? 'selected' : '' }}>Afternoon (12pm - 4pm)</option>
                                            <option value="evening" {{ old('preferred_time') == 'evening' ? 'selected' : '' }}>Evening (4pm - 6pm)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label">Reason for Visit <span>*</span></label>
                                        <select name="visit_reason" class="form-control-custom @error('visit_reason') input-error @enderror" required>
                                            <option value="" disabled {{ old('visit_reason') ? '' : 'selected' }}>Select a reason</option>
                                            <option value="checkup" {{ old('visit_reason') == 'checkup' ? 'selected' : '' }}>General Checkup</option>
                                            <option value="cleaning" {{ old('visit_reason') == 'cleaning' ? 'selected' : '' }}>Hygiene / Cleaning</option>
                                            <option value="whitening" {{ old('visit_reason') == 'whitening' ? 'selected' : '' }}>Tooth Whitening</option>
                                            <option value="consultation" {{ old('visit_reason') == 'consultation' ? 'selected' : '' }}>Consultation</option>
                                            <option value="emergency" {{ old('visit_reason') == 'emergency' ? 'selected' : '' }}>Emergency</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Row 4 -->
                            <div class="form-group" style="margin-bottom: 24px;">
                                <label class="form-label">Additional Notes (Optional)</label>
                                <textarea name="notes" class="form-control-custom" placeholder="Tell us anything we should know">{{ old('notes') }}</textarea>
                            </div>

                            <button type="submit" class="btn-submit">
                                <i class="fa-regular fa-calendar"></i>
                                Book Appointment
                                <i class="fa-solid fa-arrow-right ms-1"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
