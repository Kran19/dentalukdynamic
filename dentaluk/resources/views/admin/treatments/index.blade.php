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
                    <table class="table table-cms">
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
                                    <td><i class="{{ $tx->icon_class ?? 'fa-solid fa-tooth' }} fs-5 text-warning"></i></td>
                                    <td class="fw-bold text-light">{{ $tx->name }}</td>
                                    <td>{{ $tx->short_desc }}</td>
                                    <td><span class="badge {{ $tx->is_published ? 'bg-success' : 'bg-secondary' }}">{{ $tx->is_published ? 'Published' : 'Draft' }}</span></td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.treatments.edit', $tx) }}" class="btn btn-gold btn-sm me-1">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.treatments.destroy', $tx) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete treatment?');">
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
                                    <td colspan="5" class="text-center text-white-50 py-3">No treatments in this category.</td>
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
                            <input type="text" name="name" class="form-control bg-secondary text-light border-0" required placeholder="e.g. Tooth Whitening">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">URL Slug</label>
                            <input type="text" name="slug" class="form-control bg-secondary text-light border-0" required placeholder="tooth-whitening">
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
</x-layouts.admin>
