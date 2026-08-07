<x-layouts.admin title="Page Manager CMS | Icon Dental CMS" headerTitle="Website Pages & Section CMS">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Page Content Sections</h2>
            <p class="text-white-50 small mb-0">Select a section to modify titles, subtitles, hero buttons, and text copy.</p>
        </div>
    </div>

    @foreach ($pages as $page)
        <div class="cms-card mb-4">
            <div class="cms-card-header">
                <h3 class="cms-card-title"><i class="fa-regular fa-file-code me-2"></i> {{ $page->title }} (<code>/{{ $page->slug === 'home' ? '' : $page->slug }}</code>)</h3>
                <span class="badge bg-success">Published</span>
            </div>
            <div class="cms-card-body p-0">
                <div class="table-responsive">
                    <table class="table table-cms table-mobile-cards">
                        <thead>
                            <tr>
                                <th>Sort</th>
                                <th>Section Key</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($page->sections as $sec)
                                <tr>
                                    <td data-label="Sort" style="color: #555;">{{ $sec->sort_order }}</td>
                                    <td data-label="Section Key"><span class="fw-semibold font-monospace" style="color: #555;">{{ $sec->section_key }}</span></td>
                                    <td data-label="Title" class="fw-bold" style="color: #111;">{{ $sec->title ?? 'N/A' }}</td>
                                    <td data-label="Subtitle" style="color: #333;">{{ $sec->subtitle ?? 'N/A' }}</td>
                                    <td data-label="Status"><span class="badge bg-success">Active</span></td>
                                    <td data-label="Actions" class="text-end">
                                        <div class="d-flex gap-2 justify-content-end">
                                            <a href="{{ url($page->slug === 'home' ? '/' : '/' . $page->slug) }}" target="_blank" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="View Live Section">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.pages.sections.edit', $sec) }}" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="Edit Section">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.pages.sections.destroy', $sec) }}')" title="Delete Section">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-3" style="color: #6c757d !important;">No sections defined for this page.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

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
                    Are you sure you want to permanently delete this section? This action cannot be undone and will immediately remove the content from the live website.
                </div>
                <div class="modal-footer border-0 pt-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn rounded-pill px-4" style="background-color: #dc3545; color: white; border: none; font-weight: 500;">
                            Yes, Delete Section
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
    </script>
</x-layouts.admin>
