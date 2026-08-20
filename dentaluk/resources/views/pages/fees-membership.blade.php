<x-app-layout title="Fee Guide - Icon Dental Wembley" description="Our fee guide provides simple, transparent pricing for all our private and NHS treatments.">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container custom-container">
            <div class="breadcrumb-wrap mb-4">
                <a href="{{ route('home') }}">Home</a> &gt; <span>Fee Guide</span>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="hero-label">PRIVATE TREATMENT FEE GUIDE</span>
                    <h2 class="hero-title">Quality Dental Care.<br>Simple, Transparent<br>& Great Value.</h2>
                    <p class="hero-desc">Our fee guide provides simple, transparent pricing for all our private and NHS treatments.</p>
                    
                    <div class="hero-features">
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-solid fa-shield"></i></div>
                            <div>
                                <div class="hf-title">Transparent Pricing</div>
                                <p class="hf-desc">No hidden costs, ever.</p>
                            </div>
                        </div>
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                            <div>
                                <div class="hf-title">Great Value</div>
                                <p class="hf-desc">Premium care at accessible prices.</p>
                            </div>
                        </div>
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-solid fa-briefcase-medical"></i></div>
                            <div>
                                <div class="hf-title">NHS & Private Options</div>
                                <p class="hf-desc">Flexible care to suit your needs.</p>
                            </div>
                        </div>
                        <div class="hf-item">
                            <div class="hf-icon"><i class="fa-solid fa-star"></i></div>
                            <div>
                                <div class="hf-title">High Quality Materials</div>
                                <p class="hf-desc">We use the best for your smile.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Luxury Dental Reception" class="hero-image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fees Table Section -->
    <section class="fees-section" style="padding: 90px 0; padding-bottom: 120px;">
        <div class="container custom-container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="section-title">Treatment Fee Guide</h2>
                    <div class="section-desc" style="max-width: 800px; margin: 0 auto; background: rgba(177, 152, 111, 0.1); padding: 24px; border-radius: 12px; border-left: 4px solid var(--primary-blue); text-align: left;">
                        <div style="display: flex; gap: 16px; align-items: flex-start;">
                            <i class="fa-solid fa-circle-exclamation" style="color: var(--primary-blue); font-size: 24px; margin-top: 4px;"></i>
                            <div>
                                <h4 style="margin: 0 0 8px 0; font-size: 18px; font-family: var(--body-font); font-weight: 600; color: var(--dark-navy);" class="alert-title">Important Appointment Information</h4>
                                <p style="margin: 0; font-size: 15px; line-height: 1.6;"> For all private appointments and treatments, a deposit will be required. Failure to cancel your appointments 24 hours in advance of your appointments will result in a cancellation fee. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table custom-fee-table">
                    <thead>
                        <tr>
                            <th><i class="fa-solid fa-tooth"></i> Treatment Item</th>
                            <th class="text-center"><i class="fa-solid fa-briefcase-medical"></i> NHS</th>
                            <th class="text-center"><i class="fa-solid fa-star"></i> Private</th>
                            <th class="text-center"><i class="fa-solid fa-shield-heart"></i> Denplan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fees as $fee)
                            <tr>
                                <td>{{ $fee->treatment_item }}</td>
                                <td class="text-center"><span class="badge-nhs">{{ $fee->nhs_fee }}</span></td>
                                <td class="text-center">{{ $fee->private_fee }}</td>
                                <td class="text-center"><span class="badge-inc"><i class="fa-solid fa-check"></i> {{ $fee->denplan_fee }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p class="text-muted text-center mt-3" style="font-size: 13px;">** Starting prices. Final cost may vary based on individual assessment.</p>
            </div>
        </div>
    </section>
</x-app-layout>
