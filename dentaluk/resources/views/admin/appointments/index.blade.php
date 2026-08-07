<x-layouts.admin title="Appointments Manager | Icon Dental CMS" headerTitle="Patient Appointment Bookings">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Appointment Requests</h2>
            <p class="text-white-50 small mb-0">Manage incoming patient appointments submitted through the website booking portal.</p>
        </div>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Contact</th>
                            <th>Preferred Date & Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $apt)
                            <tr>
                                <td>#{{ $apt->id }}</td>
                                <td class="fw-bold text-warning">{{ $apt->full_name }}</td>
                                <td>
                                    <div>{{ $apt->email }}</div>
                                    <small class="text-white-50">{{ $apt->phone }}</small>
                                </td>
                                <td>
                                    <div>{{ $apt->preferred_date->format('d M Y') }}</div>
                                    <span class="badge bg-info text-dark" style="font-size: 11px;">{{ ucfirst($apt->preferred_time) }}</span>
                                </td>
                                <td><span class="badge bg-secondary">{{ ucfirst($apt->visit_reason) }}</span></td>
                                <td>
                                    <form action="{{ route('admin.appointments.status', $apt) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select form-select-sm bg-dark text-warning border-secondary" onchange="this.form.submit()">
                                            <option value="pending" {{ $apt->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="confirmed" {{ $apt->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="completed" {{ $apt->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="cancelled" {{ $apt->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('admin.appointments.destroy', $apt) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete appointment record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-white-50 py-4">No appointment bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>
