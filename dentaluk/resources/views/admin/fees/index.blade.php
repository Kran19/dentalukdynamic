<x-layouts.admin title="Fee Guide CMS | Icon Dental CMS" headerTitle="Treatment Fee Guide Management">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Fee Guide Items</h2>
            <p class="text-white-50 small mb-0">Add, edit, or update NHS, Private, and Denplan pricing rates shown on the website.</p>
        </div>
        <button class="btn btn-gold" data-bs-toggle="modal" data-bs-target="#addFeeModal">
            <i class="fa-solid fa-plus me-1"></i> Add Treatment Fee
        </button>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive">
                <table class="table table-cms">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Treatment Item</th>
                            <th>NHS Fee</th>
                            <th>Private Fee</th>
                            <th>Denplan Fee</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fees as $fee)
                            <tr>
                                <td>{{ $fee->sort_order }}</td>
                                <td class="fw-semibold text-warning">{{ $fee->treatment_item }}</td>
                                <td><span class="badge bg-secondary">{{ $fee->nhs_fee }}</span></td>
                                <td class="fw-bold">{{ $fee->private_fee }}</td>
                                <td><span class="badge bg-success">{{ $fee->denplan_fee }}</span></td>
                                <td class="text-end">
                                    <form action="{{ route('admin.fees.destroy', $fee) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this fee item?');">
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
                                <td colspan="6" class="text-center text-white-50 py-4">No fee items configured.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Fee Modal -->
    <div class="modal fade" id="addFeeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content bg-dark text-light border border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title font-serif text-warning">Add Treatment Fee Item</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.fees.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label small">Treatment Item Name</label>
                            <input type="text" name="treatment_item" class="form-control bg-secondary text-light border-0" required placeholder="e.g. New Patient Consultation">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">NHS Fee Label</label>
                            <input type="text" name="nhs_fee" class="form-control bg-secondary text-light border-0" required value="NHS Fees Apply">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Private Fee Rate</label>
                            <input type="text" name="private_fee" class="form-control bg-secondary text-light border-0" required placeholder="from £45.00">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Denplan Status</label>
                            <input type="text" name="denplan_fee" class="form-control bg-secondary text-light border-0" required value="To Be Started">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control bg-secondary text-light border-0" value="{{ $fees->count() + 1 }}">
                        </div>
                    </div>
                    <div class="modal-footer border-secondary">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-gold">Create Fee Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.admin>
