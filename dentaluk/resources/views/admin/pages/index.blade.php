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
                    <table class="table table-cms">
                        <thead>
                            <tr>
                                <th>Section Key</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Sort</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($page->sections as $sec)
                                <tr>
                                    <td><code class="text-warning">{{ $sec->section_key }}</code></td>
                                    <td class="fw-bold">{{ $sec->title ?? 'N/A' }}</td>
                                    <td>{{ $sec->subtitle ?? 'N/A' }}</td>
                                    <td>{{ $sec->sort_order }}</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.pages.sections.edit', $sec) }}" class="btn btn-gold btn-sm">
                                            <i class="fa-solid fa-pen-to-square me-1"></i> Edit Section
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-white-50 py-3">No sections defined for this page.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
</x-layouts.admin>
