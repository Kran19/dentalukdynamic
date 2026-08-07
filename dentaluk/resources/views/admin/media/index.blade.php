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
                            
                            <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center mt-2 w-100" style="height: 28px; padding: 0; border-radius: 6px; font-size: 11px;" onclick="confirmDelete('{{ route('admin.media.destroy', $item) }}')" title="Delete Asset">
                                <i class="fa-solid fa-trash me-1"></i> Delete
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5" style="color: #6c757d !important;">
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i>Upload Media Asset
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Select File (JPEG, PNG, WebP, SVG, PDF)</label>
                            <input type="file" name="file" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">ALT Text / Description</label>
                            <input type="text" name="alt_text" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" placeholder="Image ALT tag description">
                        </div>
                    </div>
                    <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                        <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                        <button type="submit" class="btn rounded-pill px-4" style="background: #b1986f; color: #111a10; font-weight: 600; border: none;">Upload Asset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 26px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="color: #e2e8f0; font-size: 15px; padding: 24px;">
                    Are you sure you want to permanently delete this media asset? This action cannot be undone.
                </div>
                <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="m-0">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn rounded-pill px-4" style="background-color: #dc3545; color: white; border: none; font-weight: 500;">Yes, Delete</button>
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
