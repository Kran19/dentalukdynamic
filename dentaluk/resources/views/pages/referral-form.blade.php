<x-app-layout title="Referral Form - Icon Dental Wembley" description="Complete the referral form below and our reception team will contact you within 48 hours.">
    <section class="referral-section">
        <div class="container custom-container">
            
            <!-- Breadcrumb Navigation -->
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i> Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <a href="{{ route('dentists') }}">For Dentists</a>
                <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
                <span>Referral Form</span>
            </div>

            <!-- Page Title Section -->
            <div class="referral-header text-center">
                <span class="gold-pill">ONLINE REFERRALS</span>
                <h1 class="referral-title">Dental Referral Form</h1>
                <div class="gold-line mx-auto"></div>
                <p class="referral-subtitle">Complete the referral form below and our reception team will contact you within 48 hours.</p>
            </div>

            <!-- Referral Form Container -->
            <div class="referral-container">
                @if (session('success'))
                    <div class="alert alert-success border-0 rounded-4 p-4 mb-4 text-center" style="background: rgba(46, 125, 50, 0.1); border-left: 4px solid #2e7d32 !important;">
                        <i class="fa-solid fa-circle-check fs-2 text-success mb-2 d-block"></i>
                        <h4 class="fw-bold text-success">Referral Submitted Successfully</h4>
                        <p class="mb-0 text-dark">{{ session('success') }}</p>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger border-0 rounded-4 p-4 mb-4">
                        <h5 class="fw-bold text-danger mb-2">Please fix the following validation errors:</h5>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('referral.store') }}" method="POST">
                    @csrf
                    
                    <!-- Section 1: Referring Dentist Details -->
                    <div class="referral-card">
                        <div class="referral-card-header">
                            <i class="fa-solid fa-user-doctor"></i>
                            <h2>1. Referring Dentist Details</h2>
                        </div>
                        <div class="referral-card-body">
                            <div class="form-row">
                                <div class="form-col form-col-title">
                                    <div class="form-group">
                                        <label class="form-label" for="dentistTitle">Title <span>*</span></label>
                                        <select class="form-control-custom" id="dentistTitle" name="dentistTitle" required>
                                            <option value="" disabled {{ old('dentistTitle') ? '' : 'selected' }}>Select</option>
                                            <option value="Dr" {{ old('dentistTitle') == 'Dr' ? 'selected' : '' }}>Dr</option>
                                            <option value="Mr" {{ old('dentistTitle') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                            <option value="Mrs" {{ old('dentistTitle') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                            <option value="Miss" {{ old('dentistTitle') == 'Miss' ? 'selected' : '' }}>Miss</option>
                                            <option value="Ms" {{ old('dentistTitle') == 'Ms' ? 'selected' : '' }}>Ms</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-col form-col-name">
                                    <div class="form-group">
                                        <label class="form-label" for="dentistFirstName">First Name <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="dentistFirstName" name="dentistFirstName" value="{{ old('dentistFirstName') }}" placeholder="Enter first name" required>
                                    </div>
                                </div>
                                <div class="form-col form-col-name">
                                    <div class="form-group">
                                        <label class="form-label" for="dentistLastName">Last Name <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="dentistLastName" name="dentistLastName" value="{{ old('dentistLastName') }}" placeholder="Enter last name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="dentistEmail">Email Address <span>*</span></label>
                                        <input type="email" class="form-control-custom" id="dentistEmail" name="dentistEmail" value="{{ old('dentistEmail') }}" placeholder="dentist@example.com" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="dentistPhone">Telephone <span>*</span></label>
                                        <input type="tel" class="form-control-custom" id="dentistPhone" name="dentistPhone" value="{{ old('dentistPhone') }}" placeholder="Enter phone number" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2: Referring Practice Details -->
                    <div class="referral-card">
                        <div class="referral-card-header">
                            <i class="fa-solid fa-hospital"></i>
                            <h2>2. Referring Practice Details</h2>
                        </div>
                        <div class="referral-card-body">
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="practiceName">Practice Name <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="practiceName" name="practiceName" value="{{ old('practiceName') }}" placeholder="Enter practice name" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="practicePostcode">Postcode <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="practicePostcode" name="practicePostcode" value="{{ old('practicePostcode') }}" placeholder="Enter postcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label" for="practiceAddress">Practice Address <span>*</span></label>
                                <input type="text" class="form-control-custom" id="practiceAddress" name="practiceAddress" value="{{ old('practiceAddress') }}" placeholder="Enter street address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="practicePhone">Telephone Number <span>*</span></label>
                                        <input type="tel" class="form-control-custom" id="practicePhone" name="practicePhone" value="{{ old('practicePhone') }}" placeholder="Enter practice phone" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="practiceEmail">Email <span>*</span></label>
                                        <input type="email" class="form-control-custom" id="practiceEmail" name="practiceEmail" value="{{ old('practiceEmail') }}" placeholder="practice@example.com" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3: Patient Details -->
                    <div class="referral-card">
                        <div class="referral-card-header">
                            <i class="fa-solid fa-user-injured"></i>
                            <h2>3. Patient Details</h2>
                        </div>
                        <div class="referral-card-body">
                            <div class="form-row">
                                <div class="form-col form-col-title">
                                    <div class="form-group">
                                        <label class="form-label" for="patientTitle">Title <span>*</span></label>
                                        <select class="form-control-custom" id="patientTitle" name="patientTitle" required>
                                            <option value="" disabled {{ old('patientTitle') ? '' : 'selected' }}>Select</option>
                                            <option value="Mr" {{ old('patientTitle') == 'Mr' ? 'selected' : '' }}>Mr</option>
                                            <option value="Mrs" {{ old('patientTitle') == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                            <option value="Miss" {{ old('patientTitle') == 'Miss' ? 'selected' : '' }}>Miss</option>
                                            <option value="Ms" {{ old('patientTitle') == 'Ms' ? 'selected' : '' }}>Ms</option>
                                            <option value="Dr" {{ old('patientTitle') == 'Dr' ? 'selected' : '' }}>Dr</option>
                                            <option value="Master" {{ old('patientTitle') == 'Master' ? 'selected' : '' }}>Master</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-col form-col-name">
                                    <div class="form-group">
                                        <label class="form-label" for="patientFirstName">First Name <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="patientFirstName" name="patientFirstName" value="{{ old('patientFirstName') }}" placeholder="Enter first name" required>
                                    </div>
                                </div>
                                <div class="form-col form-col-name">
                                    <div class="form-group">
                                        <label class="form-label" for="patientLastName">Last Name <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="patientLastName" name="patientLastName" value="{{ old('patientLastName') }}" placeholder="Enter last name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="patientDOB">Date of Birth <span>*</span></label>
                                        <input type="date" class="form-control-custom" id="patientDOB" name="patientDOB" value="{{ old('patientDOB') }}" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="patientGender">Gender <span>*</span></label>
                                        <select class="form-control-custom" id="patientGender" name="patientGender" required>
                                            <option value="" disabled {{ old('patientGender') ? '' : 'selected' }}>Select gender</option>
                                            <option value="Male" {{ old('patientGender') == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('patientGender') == 'Female' ? 'selected' : '' }}>Female</option>
                                            <option value="Other" {{ old('patientGender') == 'Other' ? 'selected' : '' }}>Other</option>
                                            <option value="PreferNotToSay" {{ old('patientGender') == 'PreferNotToSay' ? 'selected' : '' }}>Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="patientAddress">Address <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="patientAddress" name="patientAddress" value="{{ old('patientAddress') }}" placeholder="Enter patient street address" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="patientPostcode">Postcode <span>*</span></label>
                                        <input type="text" class="form-control-custom" id="patientPostcode" name="patientPostcode" value="{{ old('patientPostcode') }}" placeholder="Enter postcode" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="patientPhone">Telephone Number <span>*</span></label>
                                        <input type="tel" class="form-control-custom" id="patientPhone" name="patientPhone" value="{{ old('patientPhone') }}" placeholder="Enter patient phone" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label class="form-label" for="patientEmail">Email <span>*</span></label>
                                        <input type="email" class="form-control-custom" id="patientEmail" name="patientEmail" value="{{ old('patientEmail') }}" placeholder="patient@example.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label class="form-label" for="patientMedicalHistory">Relevant Medical History <span>*</span></label>
                                <textarea class="form-control-custom" id="patientMedicalHistory" name="patientMedicalHistory" placeholder="List any medical conditions, allergies, or medications..." required>{{ old('patientMedicalHistory') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Section 4: Treatment Required -->
                    <div class="referral-card">
                        <div class="referral-card-header">
                            <i class="fa-solid fa-notes-medical"></i>
                            <h2>4. Treatment Required</h2>
                        </div>
                        <div class="referral-card-body">
                            <label class="form-label">Please select all treatments that apply <span>*</span></label>
                            
                            @php
                                $oldTreatments = old('treatment', []);
                            @endphp

                            <div class="checkbox-grid">
                                @foreach (['Implants', 'Orthodontics', 'Oral Surgery', 'Restorative', 'Endodontics', 'Periodontics', 'DPT', 'CBCT'] as $txOption)
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="tx_{{ Str::slug($txOption) }}" name="treatment[]" value="{{ $txOption }}" {{ in_array($txOption, $oldTreatments) ? 'checked' : '' }}>
                                        <label for="tx_{{ Str::slug($txOption) }}" class="checkbox-label">
                                            <span class="checkbox-checkmark"><i class="fa-solid fa-check"></i></span>
                                            {{ $txOption }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Section 5: Type of Referral -->
                    <div class="referral-card">
                        <div class="referral-card-header">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                            <h2>5. Type & Detail of Referral</h2>
                        </div>
                        <div class="referral-card-body">
                            <label class="form-label">Type of Referral <span>*</span></label>
                            <div class="radio-group">
                                <div class="radio-item">
                                    <input type="radio" id="refRoutine" name="referralType" value="Routine" {{ old('referralType', 'Routine') == 'Routine' ? 'checked' : '' }} required>
                                    <label for="refRoutine" class="radio-label">
                                        <span class="radio-checkmark"></span>
                                        Routine
                                    </label>
                                </div>
                                <div class="radio-item">
                                    <input type="radio" id="refUrgent" name="referralType" value="Urgent" {{ old('referralType') == 'Urgent' ? 'checked' : '' }} required>
                                    <label for="refUrgent" class="radio-label">
                                        <span class="radio-checkmark"></span>
                                        Urgent
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label class="form-label" for="refReason">Reason for Referral <span>*</span></label>
                                <textarea class="form-control-custom" id="refReason" name="refReason" placeholder="Please outline the key reasons for referral..." required>{{ old('refReason') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-submit-referral mb-5">
                        <i class="fa-regular fa-paper-plane"></i>
                        Submit Referral
                    </button>

                </form>
            </div>

        </div>
    </section>
</x-app-layout>
