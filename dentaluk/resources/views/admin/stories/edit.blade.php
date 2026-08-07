<x-layouts.admin title="Edit Smile Story | Icon Dental CMS" headerTitle="Edit Transformation Story">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Edit Transformation Story: <span class="text-warning">{{ $story->patient_name }}</span></h2>
            <p class="text-white-50 small mb-0">Category: {{ $story->category }}</p>
        </div>
        <a href="{{ route('admin.stories.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Stories
        </a>
    </div>

    <div class="cms-card">
        <div class="cms-card-body">
            <form action="{{ route('admin.stories.update', $story) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label small text-light">Patient Name</label>
                        <input type="text" name="patient_name" class="form-control bg-dark text-light border-secondary" value="{{ old('patient_name', $story->patient_name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">Location</label>
                        <input type="text" name="location" class="form-control bg-dark text-light border-secondary" value="{{ old('location', $story->location) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">Category Tag</label>
                        <input type="text" name="category" class="form-control bg-dark text-light border-secondary" value="{{ old('category', $story->category) }}" required>
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" {{ $story->is_published ? 'checked' : '' }}>
                            <label class="form-check-label text-light small fw-medium" for="isPublished">Published Live</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label small text-light">Headline Quote</label>
                        <input type="text" name="quote" class="form-control bg-dark text-light border-secondary" value="{{ old('quote', $story->quote) }}" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label small text-light">Story Detail</label>
                        <textarea name="story_body" class="form-control bg-dark text-light border-secondary" rows="5" required>{{ old('story_body', $story->story_body) }}</textarea>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top border-secondary">
                    <button type="submit" class="btn btn-gold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Update Story Details
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
