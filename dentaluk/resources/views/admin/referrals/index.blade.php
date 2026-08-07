<x-layouts.admin title="Referrals Manager | Icon Dental CMS" headerTitle="Dentist Referrals Portal">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Incoming Dentist Referrals</h2>
            <p class="text-white-50 small mb-0">Manage referrals submitted by external general dental practitioners.</p>
        </div>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Referring Dentist</th>
                            <th>Practice</th>
                            <th>Patient Name</th>
                            <th>Treatments</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($referrals as $ref)
                            <tr>
                                <td>#{{ $ref->id }}</td>
                                <td class="fw-bold text-warning">{{ $ref->dentist_title }} {{ $ref->dentist_first_name }} {{ $ref->dentist_last_name }}</td>
                                <td>
                                    <div>{{ $ref->practice_name }}</div>
                                    <small class="text-white-50">{{ $ref->practice_postcode }}</small>
                                </td>
                                <td>
                                    <div>{{ $ref->patient_title }} {{ $ref->patient_first_name }} {{ $ref->patient_last_name }}</div>
                                    <small class="text-info">{{ $ref->patient_phone }}</small>
                                </td>
                                <td>
                                    @if(is_array($ref->treatments_required))
                                        @foreach($ref->treatments_required as $tx)
                                            <span class="badge bg-secondary me-1" style="font-size: 10px;">{{ $tx }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $ref->referral_type === 'Urgent' ? 'bg-danger' : 'bg-primary' }}">
                                        {{ $ref->referral_type }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('admin.referrals.status', $ref) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select form-select-sm bg-dark text-warning border-secondary" onchange="this.form.submit()">
                                            <option value="pending" {{ $ref->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="contacted" {{ $ref->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                                            <option value="in_treatment" {{ $ref->status === 'in_treatment' ? 'selected' : '' }}>In Treatment</option>
                                            <option value="completed" {{ $ref->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                            <option value="archived" {{ $ref->status === 'archived' ? 'selected' : '' }}>Archived</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="text-end">
                                    <form action="{{ route('admin.referrals.destroy', $ref) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete referral record?');">
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
                                <td colspan="8" class="text-center text-white-50 py-4">No dentist referrals recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{ $referrals->links() }}
            </div>
        </div>
    </div>
</x-layouts.admin>
