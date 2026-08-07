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
                <table class="table table-cms">
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
                                <td class="fw-bold text-warning">{{ $p->title }}</td>
                                <td><code>/{{ $p->slug }}</code></td>
                                <td><span class="badge {{ $p->is_published ? 'bg-success' : 'bg-secondary' }}">{{ $p->is_published ? 'Published' : 'Draft' }}</span></td>
                                <td>{{ $p->updated_at->format('d M Y, H:i') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('legal.show', $p->slug) }}" target="_blank" class="btn btn-outline-info btn-sm me-1">
                                        <i class="fa-solid fa-eye"></i> View Live
                                    </a>
                                    <a href="{{ route('admin.legal.edit', $p) }}" class="btn btn-gold btn-sm">
                                        <i class="fa-solid fa-pen-to-square me-1"></i> Edit Policy
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-white-50 py-4">No legal policy pages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
