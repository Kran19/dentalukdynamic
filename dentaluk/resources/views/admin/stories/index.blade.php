<x-layouts.admin title="Smile Stories CMS | Icon Dental CMS" headerTitle="Smile Transformations & Patient Stories">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Patient Transformations</h2>
            <p class="text-white-50 small mb-0">Manage patient before/after smile transformations and testimonials.</p>
        </div>
        <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addStoryModal">
            <i class="fa-solid fa-plus me-1"></i> Add Transformation
        </button>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms table-mobile-cards">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Headline / Quote</th>
                            <th>Category</th>
                            <th>Story Body</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($stories as $st)
                            <tr>
                                <td data-label="Patient Name" class="fw-bold" style="color: #000 !important;">{{ $st->patient_name }} ({{ $st->location }})</td>
                                <td data-label="Headline / Quote">{{ $st->quote }}</td>
                                <td data-label="Category"><span class="badge bg-secondary">{{ $st->category }}</span></td>
                                <td data-label="Story Body">{{ Str::limit($st->story_body, 60) }}</td>
                                <td data-label="Actions" class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('admin.stories.edit', $st) }}" class="btn btn-gold d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="Edit Story">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.stories.destroy', $st) }}')" title="Delete Story">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-5" style="color: #6c757d !important;">
                                    <i class="fa-solid fa-face-smile fs-1 mb-2 d-block text-secondary"></i>
                                    No smile stories found. Click "Add Smile Story" to showcase your work.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Story Modal -->
    <div class="modal fade" id="addStoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-plus me-2"></i>Add Smile Story
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <form action="{{ route('admin.stories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Patient Name</label>
                            <input type="text" name="patient_name" class="form-control border-0" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required placeholder="Sarah T.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Location</label>
                            <input type="text" name="location" class="form-control border-0" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required value="Wembley">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Category Tag</label>
                            <input type="text" name="category" class="form-control border-0" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required value="SMILE MAKEOVER">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Quote / Headline</label>
                            <input type="text" name="quote" class="form-control border-0" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required placeholder="From Uneasy to Unstoppable">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Transformation Story Detail</label>
                            <textarea name="story_body" class="form-control border-0" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" rows="3" required placeholder="Porcelain veneers and whitening..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                        <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2); font-size: 14px;">Cancel</button>
                        <button type="submit" class="btn rounded-pill px-4" style="background: #b1986f; color: #111a10; font-weight: 600; border: none; font-size: 14px;">Save Story</button>
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
                    Are you sure you want to permanently delete this smile story? This action cannot be undone.
                </div>
                <div class="modal-footer border-0 pt-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill px-4" style="background-color: #dc3545; color: white; border: none; font-weight: 500;">Yes, Delete Story</button>
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
    </script>
</x-layouts.admin>
