<x-layouts.admin title="Practice Dashboard | Icon Dental CMS" headerTitle="Practice Management Console">
    <!-- Top Metric Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="cms-card p-4 d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-white-50 small text-uppercase fw-bold">Pending Bookings</span>
                    <h2 class="text-warning font-serif display-6 fw-bold mb-0 mt-1">{{ $pendingAppointmentsCount }}</h2>
                </div>
                <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3 fs-3">
                    <i class="fa-regular fa-calendar-check"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="cms-card p-4 d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-white-50 small text-uppercase fw-bold">Pending Referrals</span>
                    <h2 class="text-info font-serif display-6 fw-bold mb-0 mt-1">{{ $pendingReferralsCount }}</h2>
                </div>
                <div class="bg-info bg-opacity-10 text-info rounded-circle p-3 fs-3">
                    <i class="fa-solid fa-file-medical"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="cms-card p-4 d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-white-50 small text-uppercase fw-bold">Total Team Staff</span>
                    <h2 class="text-light font-serif display-6 fw-bold mb-0 mt-1">{{ \App\Models\TeamMember::count() }}</h2>
                </div>
                <div class="bg-secondary bg-opacity-25 text-light rounded-circle p-3 fs-3">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="cms-card p-4 d-flex align-items-center justify-content-between">
                <div>
                    <span class="text-white-50 small text-uppercase fw-bold">System Status</span>
                    <h2 class="text-success font-serif h4 fw-bold mb-0 mt-1"><i class="fa-solid fa-circle me-1 fs-6"></i> Live</h2>
                </div>
                <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 fs-3">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Incoming Appointment Bookings -->
    <div class="cms-card">
        <div class="cms-card-header">
            <h3 class="cms-card-title"><i class="fa-regular fa-calendar-check me-2"></i> Incoming Appointment Bookings</h3>
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-outline-warning btn-sm">View All</a>
        </div>
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Preferred Date</th>
                            <th>Time Slot</th>
                            <th>Reason</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentAppointments as $apt)
                            <tr>
                                <td>#{{ $apt->id }}</td>
                                <td class="fw-bold text-warning">{{ $apt->full_name }}</td>
                                <td>{{ $apt->email }}</td>
                                <td>{{ $apt->phone }}</td>
                                <td>{{ $apt->preferred_date->format('d M Y') }}</td>
                                <td><span class="badge bg-info text-dark">{{ ucfirst($apt->preferred_time) }}</span></td>
                                <td>{{ ucfirst($apt->visit_reason) }}</td>
                                <td><span class="badge bg-warning text-dark">{{ ucfirst($apt->status) }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-white-50 py-4">No appointment bookings recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Incoming Dentist Referrals -->
    <div class="cms-card">
        <div class="cms-card-header">
            <h3 class="cms-card-title"><i class="fa-solid fa-file-medical me-2"></i> Incoming Dentist Referrals</h3>
            <a href="{{ route('admin.referrals.index') }}" class="btn btn-outline-warning btn-sm">View All</a>
        </div>
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Referring Dentist</th>
                            <th>Practice</th>
                            <th>Patient Name</th>
                            <th>Patient Phone</th>
                            <th>Treatments</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentReferrals as $ref)
                            <tr>
                                <td>#{{ $ref->id }}</td>
                                <td class="fw-bold text-warning">{{ $ref->dentist_title }} {{ $ref->dentist_first_name }} {{ $ref->dentist_last_name }}</td>
                                <td>{{ $ref->practice_name }} ({{ $ref->practice_postcode }})</td>
                                <td>{{ $ref->patient_title }} {{ $ref->patient_first_name }} {{ $ref->patient_last_name }}</td>
                                <td>{{ $ref->patient_phone }}</td>
                                <td>
                                    @if(is_array($ref->treatments_required))
                                        @foreach($ref->treatments_required as $tx)
                                            <span class="badge bg-secondary me-1">{{ $tx }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $ref->referral_type == 'Urgent' ? 'bg-danger' : 'bg-primary' }}">
                                        {{ $ref->referral_type }}
                                    </span>
                                </td>
                                <td><span class="badge bg-warning text-dark">{{ ucfirst($ref->status) }}</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-white-50 py-4">No dentist referrals submitted yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
