<x-layouts.admin title="Edit Legal Policy | Icon Dental CMS" headerTitle="Edit Legal Policy Content">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Edit Policy: <span class="text-warning">{{ $page->title }}</span></h2>
            <p class="text-white-50 small mb-0">URL Endpoint: <code>/{{ $page->slug }}</code></p>
        </div>
        <a href="{{ route('admin.legal.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="fa-solid fa-arrow-left me-1"></i> Back to Legal Pages
        </a>
    </div>

    <div class="cms-card">
        <div class="cms-card-body">
            <form action="{{ route('admin.legal.update', $page) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-8">
                        <label class="form-label small text-light">Policy Title</label>
                        <input type="text" name="title" class="form-control bg-dark text-light border-secondary" value="{{ old('title', $page->title) }}" required>
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_published" id="isPublished" {{ $page->is_published ? 'checked' : '' }}>
                            <label class="form-check-label text-light small fw-medium" for="isPublished">Publish Live</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label small text-light">Policy Body Content (HTML / Rich Text)</label>
                        <textarea name="content" class="form-control bg-dark text-light border-secondary font-monospace" rows="14" required>{{ old('content', $page->content) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">SEO Meta Title</label>
                        <input type="text" name="meta_title" class="form-control bg-dark text-light border-secondary" value="{{ old('meta_title', $page->meta_title) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label small text-light">SEO Meta Description</label>
                        <input type="text" name="meta_description" class="form-control bg-dark text-light border-secondary" value="{{ old('meta_description', $page->meta_description) }}">
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top border-secondary">
                    <button type="submit" class="btn btn-gold">
                        <i class="fa-solid fa-floppy-disk me-1"></i> Update Policy Content
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.admin>
