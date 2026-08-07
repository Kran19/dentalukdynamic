<x-layouts.admin title="Team Manager CMS | Icon Dental CMS" headerTitle="Dental Team & Staff Management">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Dental Team Profiles</h2>
            <p class="text-white-50 small mb-0">Manage clinical staff, bios, GDC numbers, and portraits displayed on the website.</p>
        </div>
        <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addTeamModal">
            <i class="fa-solid fa-plus me-1"></i> Add Team Member
        </button>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms">
                    <thead>
                        <tr>
                            <th>Member</th>
                            <th>Role & GDC</th>
                            <th>Category</th>
                            <th>Sort</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $m)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="{{ asset($m->image_path) }}" alt="{{ $m->name }}" class="rounded-circle border border-warning" style="width: 44px; height: 44px; object-fit: cover;">
                                        <div>
                                            <div class="fw-bold text-warning">{{ $m->name }}</div>
                                            <small class="text-white-50" style="font-size: 11px;">ID: #{{ $m->id }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $m->role }}</div>
                                    <small class="text-info">{{ $m->gdc_number ?? 'N/A' }}</small>
                                </td>
                                <td><span class="badge bg-secondary">{{ $m->category }}</span></td>
                                <td>{{ $m->sort_order }}</td>
                                <td class="text-end">
                                    <form action="{{ route('admin.team.destroy', $m) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this team member?');">
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
                                <td colspan="5" class="text-center text-white-50 py-4">No team members found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Team Modal -->
    <div class="modal fade" id="addTeamModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark text-light border border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-serif text-warning">Add Team Member Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small">Full Name</label>
                                <input type="text" name="name" class="form-control bg-secondary text-light border-0" required placeholder="Dr. Kishan Sheth">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Role Title</label>
                                <input type="text" name="role" class="form-control bg-secondary text-light border-0" required placeholder="Principal Dentist">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">GDC Registration Number</label>
                                <input type="text" name="gdc_number" class="form-control bg-secondary text-light border-0" placeholder="GDC: 279027">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Category Section</label>
                                <select name="category" class="form-select bg-secondary text-light border-0" required>
                                    <option value="Management">Management</option>
                                    <option value="Dentists">Dentists</option>
                                    <option value="Hygienists">Hygienists</option>
                                    <option value="Nurses">Nurses</option>
                                    <option value="FrontOfHouse">Front of House</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small">Biography Text</label>
                                <textarea name="bio" class="form-control bg-secondary text-light border-0" rows="4" required placeholder="Enter full biography details..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Profile Image Upload (Optional)</label>
                                <input type="file" name="image" class="form-control bg-secondary text-light border-0" accept="image/*">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control bg-secondary text-light border-0" value="{{ $members->count() + 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold">Save Team Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
