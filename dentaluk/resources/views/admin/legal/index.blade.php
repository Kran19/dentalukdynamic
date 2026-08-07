<x-layouts.admin title="Legal Pages CMS | Icon Dental CMS" headerTitle="Legal & Compliance Pages">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Legal Policies & Compliance CMS</h2>
            <p class="text-white-50 small mb-0">Manage Complaints Policy, Data Protection, Cookies Policy, Privacy Policy, and Terms of Use.</p>
        </div>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms table-mobile-cards">
                    <thead>
                        <tr>
                            <th>Policy Title</th>
                            <th>Clean URL</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pages as $p)
                            <tr>
                                <td data-label="Policy Title" class="fw-bold" style="color: #111;">{{ $p->title }}</td>
                                <td data-label="Clean URL"><code style="color: #b1986f;">/{{ $p->slug }}</code></td>
                                <td data-label="Status"><span class="badge {{ $p->is_published ? 'bg-success' : 'bg-secondary' }}">{{ $p->is_published ? 'Published' : 'Draft' }}</span></td>
                                <td data-label="Last Updated" style="color: #333;">{{ $p->updated_at->format('d M Y, H:i') }}</td>
                                <td data-label="Actions" class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="{{ route('legal.show', $p->slug) }}" target="_blank" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="View Live">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.legal.edit', $p) }}" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="Edit Policy">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4" style="color: #6c757d !important;">No legal policy pages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
