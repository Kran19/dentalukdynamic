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
                <table class="table table-cms">
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
                                <td class="fw-bold text-warning">{{ $st->patient_name }} ({{ $st->location }})</td>
                                <td>{{ $st->quote }}</td>
                                <td><span class="badge bg-secondary">{{ $st->category }}</span></td>
                                <td>{{ Str::limit($st->story_body, 60) }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.stories.edit', $st) }}" class="btn btn-gold btn-sm me-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.stories.destroy', $st) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete story?');">
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
                                <td colspan="5" class="text-center text-white-50 py-4">No smile stories added yet.</td>
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
            <div class="modal-content bg-dark text-light border border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-serif text-warning">Add Smile Story Transformation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.stories.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small">Patient Name</label>
                            <input type="text" name="patient_name" class="form-control bg-secondary text-light border-0" required placeholder="Sarah T.">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Location</label>
                            <input type="text" name="location" class="form-control bg-secondary text-light border-0" required value="Wembley">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Category Tag</label>
                            <input type="text" name="category" class="form-control bg-secondary text-light border-0" required value="SMILE MAKEOVER">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Quote / Headline</label>
                            <input type="text" name="quote" class="form-control bg-secondary text-light border-0" required placeholder="From Uneasy to Unstoppable">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Transformation Story Detail</label>
                            <textarea name="story_body" class="form-control bg-secondary text-light border-0" rows="3" required placeholder="Porcelain veneers and whitening..."></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold">Save Story</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
