<x-layouts.admin title="Edit Treatment | Icon Dental CMS" headerTitle="Edit Treatment Service">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Edit Treatment: <span class="text-warning">{{ $treatment->name }}</span></h2>
            <p class="text-white-50 small mb-0">Category: {{ $treatment->category->name ?? 'Uncategorized' }}</p>
        </div>
        <a href="{{ route('admin.treatments.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Treatments
        </a>
    </div>

    <div class="cms-card">
        <div class="cms-card-body">
            <form action="{{ route('admin.treatments.update', $treatment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label small text-light">Treatment Category</label>
                        <select name="category_id" class="form-select bg-dark text-light border-secondary" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $treatment->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">Treatment Name</label>
                        <input type="text" name="name" class="form-control bg-dark text-light border-secondary" value="{{ old('name', $treatment->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">Icon Class (FontAwesome)</label>
                        <input type="text" name="icon_class" class="form-control bg-dark text-light border-secondary" value="{{ old('icon_class', $treatment->icon_class) }}">
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" {{ $treatment->is_published ? 'checked' : '' }}>
                            <label class="form-check-label text-light small fw-medium" for="isPublished">Published Live</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label small text-light">Short Summary Description</label>
                        <textarea name="short_desc" class="form-control bg-dark text-light border-secondary" rows="3">{{ old('short_desc', $treatment->short_desc) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label small text-light">Full Treatment Content (HTML)</label>
                        <textarea name="full_content" class="form-control bg-dark text-light border-secondary" rows="8">{{ old('full_content', $treatment->full_content) }}</textarea>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top border-secondary">
                    <button type="submit" class="btn btn-gold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Update Treatment Details
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
