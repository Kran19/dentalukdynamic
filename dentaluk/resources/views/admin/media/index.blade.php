<x-layouts.admin title="Media Manager CMS | Icon Dental CMS" headerTitle="Enterprise Media Library Manager">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Media Assets & Images</h2>
            <p class="text-white-50 small mb-0">Upload, organize, and manage image assets and documents for the website.</p>
        </div>
        <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#uploadMediaModal">
            <i class="fa-solid fa-cloud-arrow-up me-1"></i> Upload Asset
        </button>
    </div>

    <div class="cms-card">
        <div class="cms-card-body">
            <div class="row g-3">
                @forelse ($mediaItems as $item)
                    <div class="col-6 col-md-3 col-lg-2">
                        <div class="card bg-dark border-secondary h-100 p-2 text-center">
                            @if (Str::contains($item->mime_type, 'image'))
                                <img src="{{ asset($item->file_path) }}" alt="{{ $item->alt_text }}" class="rounded mb-2 style-img" style="height: 100px; object-fit: cover; width: 100%;">
                            @else
                                <div class="bg-secondary p-3 rounded mb-2"><i class="fa-solid fa-file fs-2 text-warning"></i></div>
                            @endif
                            <small class="text-truncate text-light d-block" style="font-size: 11px;">{{ $item->filename }}</small>
                            <small class="text-white-50" style="font-size: 10px;">{{ round($item->file_size / 1024, 1) }} KB</small>
                            
                            <form action="{{ route('admin.media.destroy', $item) }}" method="POST" class="mt-2" onsubmit="return confirm('Delete media asset?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-2" style="font-size: 10px;">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-white-50 py-5">
                        <i class="fa-regular fa-images fs-1 mb-2"></i>
                        <p>No media files uploaded yet.</p>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-4">
                {{ $mediaItems->links() }}
            </div>
        </div>
    </div>

    <!-- Upload Media Modal -->
    <div class="modal fade" id="uploadMediaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light border border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-serif text-warning">Upload Media Asset</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small">Select File (JPEG, PNG, WebP, SVG, PDF)</label>
                            <input type="file" name="file" class="form-control bg-secondary text-light border-0" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">ALT Text / Description</label>
                            <input type="text" name="alt_text" class="form-control bg-secondary text-light border-0" placeholder="Image ALT tag description">
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold">Upload Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
