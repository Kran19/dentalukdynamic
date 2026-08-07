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
                <table class="table table-cms table-mobile-cards">
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
                                <td data-label="Order" style="color: #555;">{{ $fee->sort_order }}</td>
                                <td data-label="Treatment Item" class="fw-semibold" style="color: #111;">{{ $fee->treatment_item }}</td>
                                <td data-label="NHS Fee"><span class="badge bg-secondary">{{ $fee->nhs_fee }}</span></td>
                                <td data-label="Private Fee" class="fw-bold" style="color: #333;">{{ $fee->private_fee }}</td>
                                <td data-label="Denplan Fee"><span class="badge bg-success">{{ $fee->denplan_fee }}</span></td>
                                <td data-label="Actions" class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button type="button" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="Edit Fee"
                                            onclick="editFee({{ $fee->id }}, '{{ addslashes($fee->treatment_item) }}', '{{ addslashes($fee->nhs_fee) }}', '{{ addslashes($fee->private_fee) }}', '{{ addslashes($fee->denplan_fee) }}', {{ $fee->sort_order }})">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.fees.destroy', $fee) }}')" title="Delete Fee">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-4" style="color: #6c757d !important;">No fee items configured.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Fee Modal -->
    <div class="modal fade" id="addFeeModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-plus me-2"></i>Add Treatment Fee Item
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <form action="{{ route('admin.fees.store') }}" method="POST">
                    @csrf
                    <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Treatment Item Name</label>
                            <input type="text" name="treatment_item" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required placeholder="e.g. New Patient Consultation">
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">NHS Fee Label</label>
                            <input type="text" name="nhs_fee" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required value="NHS Fees Apply">
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Private Fee Rate</label>
                            <input type="text" name="private_fee" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required placeholder="from £45.00">
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Denplan Status</label>
                            <input type="text" name="denplan_fee" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required value="To Be Started">
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" value="{{ $fees->count() + 1 }}">
                        </div>
                    </div>
                    <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                        <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                        <button type="submit" class="btn rounded-pill px-4" style="background: #b1986f; color: #111a10; font-weight: 600; border: none;">Create Fee Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Fee Modal -->
    <div class="modal fade" id="editFeeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit Fee Item
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <form id="editFeeForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Treatment Item Name</label>
                            <input type="text" id="e_treatment_item" name="treatment_item" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">NHS Fee Label</label>
                            <input type="text" id="e_nhs_fee" name="nhs_fee" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Private Fee Rate</label>
                            <input type="text" id="e_private_fee" name="private_fee" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Denplan Status</label>
                            <input type="text" id="e_denplan_fee" name="denplan_fee" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required>
                        </div>
                        <div class="mb-3">
                            <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Sort Order</label>
                            <input type="number" id="e_sort_order" name="sort_order" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                        <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                        <button type="submit" class="btn rounded-pill px-4" style="background: #b1986f; color: #111a10; font-weight: 600; border: none;">Save Changes</button>
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
                    Are you sure you want to permanently delete this fee item? This action cannot be undone.
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

        function editFee(id, item, nhs, private, denplan, sort) {
            document.getElementById('editFeeForm').action = '/admin/fees/' + id;
            document.getElementById('e_treatment_item').value = item;
            document.getElementById('e_nhs_fee').value = nhs;
            document.getElementById('e_private_fee').value = private;
            document.getElementById('e_denplan_fee').value = denplan;
            document.getElementById('e_sort_order').value = sort;
            new bootstrap.Modal(document.getElementById('editFeeModal')).show();
        }
    </script>
</x-layouts.admin>
