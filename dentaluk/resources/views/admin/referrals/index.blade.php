<x-layouts.admin title="Referrals Manager | Icon Dental CMS" headerTitle="Dentist Referrals Portal">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Incoming Dentist Referrals</h2>
            <p class="text-white-50 small mb-0">Manage referrals submitted by external general dental practitioners.</p>
        </div>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive" style="overflow: visible;">
                <table class="table table-cms table-mobile-cards">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Referring Dentist</th>
                            <th>Practice</th>
                            <th>Patient Name</th>
                            <th>Treatments</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($referrals as $ref)
                            @if($ref->status === 'contacted')
                                @php $statusColor = '#0d6efd'; $statusTextColor = '#fff'; @endphp
                            @elseif($ref->status === 'in_treatment')
                                @php $statusColor = '#198754'; $statusTextColor = '#fff'; @endphp
                            @elseif($ref->status === 'completed')
                                @php $statusColor = '#6f42c1'; $statusTextColor = '#fff'; @endphp
                            @elseif($ref->status === 'archived')
                                @php $statusColor = '#6c757d'; $statusTextColor = '#fff'; @endphp
                            @else
                                @php $statusColor = '#e6a817'; $statusTextColor = '#000'; @endphp
                            @endif
                            <tr style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                <td data-label="ID" style="color:#555; position: relative; z-index: {{ 1000 - $loop->index }};">#{{ $ref->id }}</td>
                                <td data-label="Referring Dentist" style="color:#111; font-weight:600; position: relative; z-index: {{ 1000 - $loop->index }};">{{ $ref->dentist_title }} {{ $ref->dentist_first_name }} {{ $ref->dentist_last_name }}</td>
                                <td data-label="Practice" style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                    <div style="color:#333;">{{ $ref->practice_name }}</div>
                                    <small style="color:#777;">{{ $ref->practice_postcode }}</small>
                                </td>
                                <td data-label="Patient Name" style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                    <div style="color:#333;">{{ $ref->patient_title }} {{ $ref->patient_first_name }} {{ $ref->patient_last_name }}</div>
                                    <small style="color:#777;">{{ $ref->patient_phone }}</small>
                                </td>
                                <td data-label="Treatments" style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                    @if(is_array($ref->treatments_required))
                                        @foreach($ref->treatments_required as $tx)
                                            <span class="badge bg-secondary me-1 mb-1" style="font-size: 10px;">{{ $tx }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td data-label="Type" style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                    <span class="badge {{ $ref->referral_type === 'Urgent' ? 'bg-danger' : 'bg-primary' }}">
                                        {{ $ref->referral_type }}
                                    </span>
                                </td>
                                <td data-label="Status" style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle fw-semibold" type="button"
                                            data-bs-toggle="dropdown" data-bs-boundary="window"
                                            style="background-color: {{ $statusColor }}; color: {{ $statusTextColor }}; border: none; border-radius: 20px; font-size: 12px; padding: 4px 12px;">
                                            {{ ucfirst(str_replace('_', ' ', $ref->status)) }}
                                        </button>
                                        <ul class="dropdown-menu shadow" style="border-radius: 10px; min-width: 140px; border: 1px solid rgba(177,152,111,0.3); background: #1e2b1d; z-index: 9999; padding: 6px;">
                                            @foreach(['pending' => '#e6a817', 'contacted' => '#0d6efd', 'in_treatment' => '#198754', 'completed' => '#6f42c1', 'archived' => '#6c757d'] as $st => $stColor)
                                            <li>
                                                <form action="{{ route('admin.referrals.status', $ref) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="status" value="{{ $st }}">
                                                    <button type="submit"
                                                        onmouseenter="this.style.backgroundColor='{{ $stColor }}'; this.style.color='{{ $st === 'pending' ? '#000' : '#fff' }}'; this.style.transform='translateX(3px)';"
                                                        onmouseleave="this.style.backgroundColor='{{ $ref->status === $st ? $stColor : 'rgba(255,255,255,0.06)' }}'; this.style.color='{{ $ref->status === $st ? ($st === 'pending' ? '#000' : '#fff') : '#e2e8f0' }}'; this.style.transform='translateX(0)';"
                                                        style="display:block; width:100%; border:none; border-radius: 8px; padding: 7px 14px; font-size: 13px; font-weight: 600; cursor:pointer; text-align:left; margin-bottom:3px; transition: all 0.15s ease;
                                                            background-color: {{ $ref->status === $st ? $stColor : 'rgba(255,255,255,0.06)' }};
                                                            color: {{ $ref->status === $st ? ($st === 'pending' ? '#000' : '#fff') : '#e2e8f0' }};">
                                                        {{ ucfirst(str_replace('_', ' ', $st)) }}
                                                    </button>
                                                </form>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td data-label="Actions" class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button type="button" class="btn d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px; background: rgba(255,193,7,0.15); color: #ffc107; border: 1px solid rgba(255,193,7,0.3);" title="Send Reminder to Patient"
                                            onclick="sendReminder('{{ $ref->patient_email }}', '{{ $ref->patient_first_name }} {{ $ref->patient_last_name }}', '{{ addslashes($ref->practice_name) }}')">
                                            <i class="fa-solid fa-bell"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="View Referral"
                                            data-bs-toggle="modal" data-bs-target="#viewReferralModal"
                                            data-id="{{ $ref->id }}"
                                            data-dentist="{{ $ref->dentist_title }} {{ $ref->dentist_first_name }} {{ $ref->dentist_last_name }}"
                                            data-practice="{{ $ref->practice_name }} ({{ $ref->practice_postcode }})"
                                            data-patient="{{ $ref->patient_title }} {{ $ref->patient_first_name }} {{ $ref->patient_last_name }}"
                                            data-phone="{{ $ref->patient_phone }}"
                                            data-treatments="{{ is_array($ref->treatments_required) ? implode(', ', $ref->treatments_required) : $ref->treatments_required }}"
                                            data-type="{{ $ref->referral_type }}"
                                            data-status="{{ ucfirst(str_replace('_', ' ', $ref->status)) }}"
                                            data-notes="{{ $ref->notes ?? 'N/A' }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.referrals.destroy', $ref) }}')" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-secondary py-4" style="color: #6c757d !important;">No dentist referrals recorded yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{ $referrals->links() }}
            </div>
        </div>
    </div>

    <!-- View Referral Modal -->
    <div class="modal fade" id="viewReferralModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-file-medical me-2"></i>Referral Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                    <div class="row g-3">
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Referring Dentist</small><div id="rDentist" class="fw-bold mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Status</small><div id="rStatus" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Practice</small><div id="rPractice" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Referral Type</small><div id="rType" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Patient Name</small><div id="rPatient" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Patient Phone</small><div id="rPhone" class="mt-1"></div></div>
                        <div class="col-12"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Treatments Required</small><div id="rTreatments" class="mt-1"></div></div>
                        <div class="col-12"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Notes</small><div id="rNotes" class="mt-1" style="color: #a0aec0;"></div></div>
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Send Reminder Modal -->
    <div class="modal fade" id="reminderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-regular fa-envelope me-2"></i>Email Patient
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                    <div class="mb-3">
                        <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">To (Patient Email)</label>
                        <input type="email" id="reminderEmail" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;" readonly>
                    </div>
                    <div class="mb-3">
                        <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Subject</label>
                        <input type="text" id="reminderSubject" class="form-control border-0 mt-1" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px;">
                    </div>
                    <div class="mb-3">
                        <label style="font-size: 12px; color: #a0aec0; text-transform: uppercase; letter-spacing: 0.5px;">Message <span style="color: #b1986f;">(editable — customise before sending)</span></label>
                        <textarea id="reminderBody" class="form-control border-0 mt-1" rows="10" style="background: rgba(255,255,255,0.07); color: #e2e8f0; border-radius: 8px; font-size: 14px; line-height: 1.7; resize: vertical;"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <a href="#" class="btn rounded-pill px-5" onclick="launchMailto(this)" style="background: #b1986f; color: #111a10; font-weight: 600; border: none; text-decoration: none;">
                        <i class="fa-solid fa-paper-plane me-2"></i>Send Email
                    </a>
                </div>
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
                    Are you sure you want to permanently delete this referral record? This action cannot be undone.
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

        function sendReminder(email, name, practice) {
            if (!email) {
                alert('This patient does not have an email address on file.');
                return;
            }
            document.getElementById('reminderEmail').value = email;
            document.getElementById('reminderSubject').value = 'Your Referral to Icon Dental Wembley';
            document.getElementById('reminderBody').value =
                'Dear ' + name + ',\n\n' +
                'We have received a referral from ' + practice + ' for you to be seen at Icon Dental Wembley.\n\n' +
                'Please contact our clinic at your earliest convenience to book your initial consultation.\n\n' +
                'We look forward to welcoming you to our practice.\n\n' +
                'Kind regards,\n' +
                'Icon Dental Wembley Team\n' +
                '📞 020 8902 2333\n' +
                '🌐 www.icondentalwembley.co.uk';
            new bootstrap.Modal(document.getElementById('reminderModal')).show();
        }

        function launchMailto(btn) {
            const email   = document.getElementById('reminderEmail').value;
            const subject = encodeURIComponent(document.getElementById('reminderSubject').value);
            const body    = encodeURIComponent(document.getElementById('reminderBody').value);
            
            // Generate the direct Gmail web compose URL
            const gmailUrl = `https://mail.google.com/mail/?view=cm&fs=1&to=${email}&su=${subject}&body=${body}`;
            
            // Set the href on the actual anchor tag right as it is clicked
            btn.href = gmailUrl;
            btn.target = "_blank"; // Open in a new tab

            // Close the modal automatically after a tiny delay so the browser registers the click
            setTimeout(() => {
                const modalElement = document.getElementById('reminderModal');
                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                if (modalInstance) {
                    modalInstance.hide();
                }
            }, 100);
        }

        document.getElementById('viewReferralModal').addEventListener('show.bs.modal', function(e) {
            const b = e.relatedTarget;
            document.getElementById('rDentist').textContent   = b.dataset.dentist;
            document.getElementById('rPractice').textContent  = b.dataset.practice;
            document.getElementById('rPatient').textContent   = b.dataset.patient;
            document.getElementById('rPhone').textContent     = b.dataset.phone;
            document.getElementById('rTreatments').textContent= b.dataset.treatments;
            document.getElementById('rType').textContent      = b.dataset.type;
            document.getElementById('rStatus').textContent    = b.dataset.status;
            document.getElementById('rNotes').textContent     = b.dataset.notes;
        });
    </script>
</x-layouts.admin>
