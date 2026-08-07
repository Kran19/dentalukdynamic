<x-layouts.admin title="Treatments CMS | Icon Dental CMS" headerTitle="Dental Treatments & Categories">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Treatments & Categories</h2>
            <p class="text-white-50 small mb-0">Manage services, descriptions, and icon badges displayed across treatment pages.</p>
        </div>
        <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addTreatmentModal">
            <i class="fa-solid fa-plus me-1"></i> Add Treatment
        </button>
    </div>

    @foreach ($categories as $cat)
        <div class="cms-card mb-4">
            <div class="cms-card-header">
                <h3 class="cms-card-title"><i class="fa-solid fa-tooth me-2"></i> {{ $cat->name }}</h3>
                <small class="text-white-50">{{ $cat->description }}</small>
            </div>
            <div class="cms-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-cms table-mobile-cards">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Treatment Name</th>
                                <th>Short Description</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cat->treatments as $tx)
                                <tr>
                                    <td data-label="Icon"><i class="{{ $tx->icon_class ?? 'fa-solid fa-tooth' }} fs-5" style="color: #b1986f;"></i></td>
                                    <td data-label="Treatment Name" class="fw-bold" style="color: #111;">{{ $tx->name }}</td>
                                    <td data-label="Short Description" style="color: #333;">{{ $tx->short_desc }}</td>
                                    <td data-label="Status"><span class="badge {{ $tx->is_published ? 'bg-success' : 'bg-secondary' }}">{{ $tx->is_published ? 'Published' : 'Draft' }}</span></td>
                                    <td data-label="Actions" class="text-end">
                                        <div class="d-flex gap-2 justify-content-end">
                                            <a href="{{ route('admin.treatments.edit', $tx) }}" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="Edit Treatment">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.treatments.destroy', $tx) }}')" title="Delete Treatment">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-3" style="color: #6c757d !important;">No treatments in this category.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Add Treatment Modal -->
    <div class="modal fade" id="addTreatmentModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light border border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-serif text-warning">Add New Treatment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.treatments.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small">Treatment Category</label>
                            <select name="category_id" class="form-select bg-secondary text-light border-0" required>
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Treatment Name</label>
                            <select name="name" id="treatmentNameSelect" class="form-select bg-secondary text-light border-0 mb-2" required onchange="handleTreatmentNameChange(this)">
                                <option value="" disabled selected>Select a treatment...</option>
                                <option value="Dental Check-up">Dental Check-up</option>
                                <option value="Hygienist Services">Hygienist Services</option>
                                <option value="Tooth Fillings">Tooth Fillings</option>
                                <option value="Root Canal Treatment">Root Canal Treatment</option>
                                <option value="Teeth Whitening">Teeth Whitening</option>
                                <option value="Invisalign">Invisalign</option>
                                <option value="Dental Implants">Dental Implants</option>
                                <option value="Veneers">Veneers</option>
                                <option value="Crowns & Bridges">Crowns & Bridges</option>
                                <option value="Dentures">Dentures</option>
                                <option value="Tooth Extraction">Tooth Extraction</option>
                                <option value="Emergency Appointment">Emergency Appointment</option>
                                <option value="Other">Other (Please specify)</option>
                            </select>
                            <input type="text" id="treatmentNameCustom" class="form-control bg-secondary text-light border-0 d-none" placeholder="Enter custom treatment name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">URL Slug</label>
                            <input type="text" name="slug" id="treatmentSlug" class="form-control bg-secondary text-light border-0" required placeholder="tooth-whitening">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Short Description</label>
                            <textarea name="short_desc" class="form-control bg-secondary text-light border-0" rows="3" placeholder="Brief summary..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Icon Class (FontAwesome)</label>
                            <input type="text" name="icon_class" class="form-control bg-secondary text-light border-0" value="fa-solid fa-tooth">
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold">Create Treatment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Custom Premium Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px; box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 26px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="color: #e2e8f0; font-size: 15px; padding: 24px;">
                    Are you sure you want to permanently delete this treatment? This action cannot be undone and will immediately remove the content from the live website.
                </div>
                <div class="modal-footer border-0 pt-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill px-4" style="background-color: #dc3545; color: white; border: none; font-weight: 500;">
                            Yes, Delete Treatment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(deleteUrl) {
            document.getElementById('deleteForm').action = deleteUrl;
            var modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            modal.show();
        }

        function handleTreatmentNameChange(select) {
            const customInput = document.getElementById('treatmentNameCustom');
            const slugInput = document.getElementById('treatmentSlug');
            
            if (select.value === 'Other') {
                customInput.classList.remove('d-none');
                customInput.setAttribute('name', 'name');
                customInput.setAttribute('required', 'required');
                select.removeAttribute('name');
                slugInput.value = '';
            } else {
                customInput.classList.add('d-none');
                customInput.removeAttribute('name');
                customInput.removeAttribute('required');
                select.setAttribute('name', 'name');
                
                // Auto-generate slug
                if(select.value) {
                    slugInput.value = select.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
                }
            }
        }
        
        // Auto-generate slug from custom input
        document.getElementById('treatmentNameCustom').addEventListener('input', function(e) {
            document.getElementById('treatmentSlug').value = e.target.value.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');
        });
    </script>
</x-layouts.admin>
