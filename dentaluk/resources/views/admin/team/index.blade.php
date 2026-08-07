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
                <table class="table table-cms table-mobile-cards">
                    <colgroup>
                        <col style="width: 50px;">
                        <col style="width: 20%;">
                        <col style="width: 25%;">
                        <col style="width: 15%;">
                        <col style="width: 120px;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th style="text-align: center;">Sort</th>
                            <th>Member</th>
                            <th>Role & GDC</th>
                            <th>Category</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($members as $m)
                            <tr>
                                <td data-label="Sort" class="text-center fw-bold" style="color: #555;">{{ $m->sort_order }}</td>
                                <td data-label="Member" class="fw-bold" style="color: #000 !important;">{{ $m->name }}</td>
                                <td data-label="Role & GDC">
                                    <div>{{ $m->role }}</div>
                                    <small class="text-info">{{ $m->gdc_number ?? 'N/A' }}</small>
                                </td>
                                <td data-label="Category"><span class="badge bg-secondary">{{ $m->category }}</span></td>
                                <td data-label="Actions" class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ url('/about#team') }}" target="_blank" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="View Live">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-gold d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="Edit Member"
                                            data-bs-toggle="modal" data-bs-target="#editTeamModal"
                                            data-id="{{ $m->id }}"
                                            data-name="{{ $m->name }}"
                                            data-role="{{ $m->role }}"
                                            data-gdc="{{ $m->gdc_number }}"
                                            data-category="{{ $m->category }}"
                                            data-bio="{{ $m->bio }}"
                                            data-sort="{{ $m->sort_order }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.team.destroy', $m) }}')" title="Delete Member">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-5" style="color: #6c757d !important;">
                                    <i class="fa-solid fa-users-slash fs-1 mb-2 d-block text-secondary"></i>
                                    No team members found. Click "Add Team Member" to start building your team.
                                </td>
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

    <!-- Edit Team Member Modal -->
    <div class="modal fade" id="editTeamModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit Team Member
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <form id="editTeamForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small">Full Name</label>
                                <input type="text" id="editName" name="name" class="form-control bg-secondary text-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Role Title</label>
                                <input type="text" id="editRole" name="role" class="form-control bg-secondary text-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">GDC Registration Number</label>
                                <input type="text" id="editGdc" name="gdc_number" class="form-control bg-secondary text-light border-0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Category</label>
                                <select id="editCategory" name="category" class="form-select bg-secondary text-light border-0" required>
                                    <option value="Management">Management</option>
                                    <option value="Dentists">Dentists</option>
                                    <option value="Hygienists">Hygienists</option>
                                    <option value="Nurses">Nurses</option>
                                    <option value="FrontOfHouse">Front of House</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small">Sort Order</label>
                                <input type="number" id="editSort" name="sort_order" class="form-control bg-secondary text-light border-0">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label small">Biography</label>
                                <textarea id="editBio" name="bio" class="form-control bg-secondary text-light border-0" rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                        <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                        <button type="submit" class="btn rounded-pill px-4" style="background: #b1986f; color: #111a10; font-weight: 600; border: none;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Premium Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px; box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 26px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="color: #e2e8f0; font-size: 15px; padding: 24px;">
                    Are you sure you want to permanently delete this team member? This action cannot be undone.
                </div>
                <div class="modal-footer border-0 pt-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill px-4" style="background-color: #dc3545; color: white; border: none; font-weight: 500;">Yes, Delete Member</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(url) {
            document.getElementById('deleteForm').action = url;
            new bootstrap.Modal(document.getElementById('deleteConfirmModal')).show();
        }

        document.getElementById('editTeamModal').addEventListener('show.bs.modal', function(e) {
            const btn = e.relatedTarget;
            document.getElementById('editTeamForm').action = '/admin/team-members/' + btn.dataset.id;
            document.getElementById('editName').value = btn.dataset.name;
            document.getElementById('editRole').value = btn.dataset.role;
            document.getElementById('editGdc').value = btn.dataset.gdc;
            document.getElementById('editSort').value = btn.dataset.sort;
            document.getElementById('editBio').value = btn.dataset.bio;
            const cat = document.getElementById('editCategory');
            for (let o of cat.options) o.selected = (o.value === btn.dataset.category);
        });
    </script>
</x-layouts.admin>
