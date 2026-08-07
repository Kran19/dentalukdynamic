<x-layouts.admin title="Appointments Manager | Icon Dental CMS" headerTitle="Patient Appointment Bookings">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h4 text-light font-serif mb-1">Appointment Requests</h2>
            <p class="text-white-50 small mb-0">Manage incoming patient appointments submitted through the website booking portal.</p>
        </div>
    </div>

    <div class="cms-card">
        <div class="cms-card-body p-0">
            <div class="table-responsive" style="overflow: visible;">
                <table class="table table-cms table-mobile-cards">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient Name</th>
                            <th>Contact</th>
                            <th>Preferred Date & Time</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appointments as $apt)
                            @if($apt->status === 'confirmed')
                                @php $statusColor = '#198754'; $statusTextColor = '#fff'; @endphp
                            @elseif($apt->status === 'completed')
                                @php $statusColor = '#0d6efd'; $statusTextColor = '#fff'; @endphp
                            @elseif($apt->status === 'cancelled')
                                @php $statusColor = '#dc3545'; $statusTextColor = '#fff'; @endphp
                            @else
                                @php $statusColor = '#e6a817'; $statusTextColor = '#000'; @endphp
                            @endif
                            <tr style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                <td data-label="ID" style="color:#555; position: relative; z-index: {{ 1000 - $loop->index }};">#{{ $apt->id }}</td>
                                <td data-label="Patient Name" style="color:#111; font-weight:600; position: relative; z-index: {{ 1000 - $loop->index }};">{{ $apt->full_name }}</td>
                                <td data-label="Email" style="color:#333; position: relative; z-index: {{ 1000 - $loop->index }};">{{ $apt->email }}</td>
                                <td data-label="Phone" style="color:#333; position: relative; z-index: {{ 1000 - $loop->index }};">{{ $apt->phone }}</td>
                                <td data-label="Preferred Date & Time" style="color:#333; position: relative; z-index: {{ 1000 - $loop->index }};">
                                    {{ $apt->preferred_date->format('d M Y') }}
                                    <span class="badge bg-info text-dark ms-1" style="font-size: 11px;">{{ ucfirst($apt->preferred_time) }}</span>
                                </td>
                                <td data-label="Reason" style="color:#333; position: relative; z-index: {{ 1000 - $loop->index }};">{{ ucfirst($apt->visit_reason) }}</td>
                                <td data-label="Status" style="position: relative; z-index: {{ 1000 - $loop->index }};">
                                    <div class="dropdown">
                                        <button class="btn btn-sm dropdown-toggle fw-semibold" type="button"
                                            data-bs-toggle="dropdown" data-bs-boundary="window"
                                            style="background-color: {{ $statusColor }}; color: {{ $statusTextColor }}; border: none; border-radius: 20px; font-size: 12px; padding: 4px 12px;">
                                            {{ ucfirst($apt->status) }}
                                        </button>
                                        <ul class="dropdown-menu shadow" style="border-radius: 10px; min-width: 130px; border: 1px solid rgba(177,152,111,0.3); background: #1e2b1d; z-index: 9999; padding: 6px;">
                                            @foreach(['pending' => '#e6a817', 'confirmed' => '#198754', 'completed' => '#0d6efd', 'cancelled' => '#dc3545'] as $st => $stColor)
                                            <li>
                                                <form action="{{ route('admin.appointments.status', $apt) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="status" value="{{ $st }}">
                                                    <button type="submit"
                                                        onmouseenter="this.style.backgroundColor='{{ $stColor }}'; this.style.color='{{ $st === 'pending' ? '#000' : '#fff' }}'; this.style.transform='translateX(3px)';"
                                                        onmouseleave="this.style.backgroundColor='{{ $apt->status === $st ? $stColor : 'rgba(255,255,255,0.06)' }}'; this.style.color='{{ $apt->status === $st ? ($st === 'pending' ? '#000' : '#fff') : '#e2e8f0' }}'; this.style.transform='translateX(0)';"
                                                        style="display:block; width:100%; border:none; border-radius: 8px; padding: 7px 14px; font-size: 13px; font-weight: 600; cursor:pointer; text-align:left; margin-bottom:3px; transition: all 0.15s ease;
                                                            background-color: {{ $apt->status === $st ? $stColor : 'rgba(255,255,255,0.06)' }};
                                                            color: {{ $apt->status === $st ? ($st === 'pending' ? '#000' : '#fff') : '#e2e8f0' }};">
                                                        {{ ucfirst($st) }}
                                                    </button>
                                                </form>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>
                                <td data-label="Actions" class="text-end">
                                    <div class="d-flex gap-2 justify-content-end">
                                        <button type="button" class="btn d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px; background: rgba(255,193,7,0.15); color: #ffc107; border: 1px solid rgba(255,193,7,0.3);" title="Send Reminder"
                                            onclick="sendReminder('{{ $apt->email }}','{{ $apt->full_name }}','{{ $apt->preferred_date->format('d M Y') }}','{{ ucfirst($apt->preferred_time) }}')">
                                            <i class="fa-solid fa-bell"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-light text-secondary border-secondary d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" title="View Details"
                                            data-bs-toggle="modal" data-bs-target="#viewAppointmentModal"
                                            data-id="{{ $apt->id }}"
                                            data-name="{{ $apt->full_name }}"
                                            data-email="{{ $apt->email }}"
                                            data-phone="{{ $apt->phone }}"
                                            data-date="{{ $apt->preferred_date->format('d M Y') }}"
                                            data-time="{{ ucfirst($apt->preferred_time) }}"
                                            data-reason="{{ ucfirst($apt->visit_reason) }}"
                                            data-status="{{ ucfirst($apt->status) }}"
                                            data-notes="{{ $apt->notes ?? 'N/A' }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger d-inline-flex align-items-center justify-content-center" style="width: 36px; height: 36px; padding: 0; border-radius: 8px;" onclick="confirmDelete('{{ route('admin.appointments.destroy', $apt) }}')" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-secondary py-4" style="color: #6c757d !important;">No appointment bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-3">
                {{ $appointments->links() }}
            </div>
        </div>
    </div>

    <!-- View Appointment Modal -->
    <div class="modal fade" id="viewAppointmentModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-calendar-check me-2"></i>Appointment Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="padding: 24px; color: #e2e8f0;">
                    <div class="row g-3">
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Patient Name</small><div id="vName" class="fw-bold mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Status</small><div id="vStatus" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Email</small><div id="vEmail" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Phone</small><div id="vPhone" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Preferred Date</small><div id="vDate" class="mt-1"></div></div>
                        <div class="col-6"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Time Preference</small><div id="vTime" class="mt-1"></div></div>
                        <div class="col-12"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Reason</small><div id="vReason" class="mt-1"></div></div>
                        <div class="col-12"><small style="color: #a0aec0; font-size: 11px; text-transform: uppercase;">Notes</small><div id="vNotes" class="mt-1" style="color: #a0aec0;"></div></div>
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <!-- Send Reminder Modal -->
    <div class="modal fade" id="reminderModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 24px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-bell me-2"></i>Send Appointment Reminder
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

    <!-- Premium Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1e2b1d; border: 1px solid rgba(177, 152, 111, 0.3); border-radius: 16px; box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" style="font-family: 'Cormorant Garamond', serif; font-size: 26px; font-weight: 600; color: #b1986f;">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>Confirm Deletion
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" style="opacity: 0.5;"></button>
                </div>
                <div class="modal-body" style="color: #e2e8f0; font-size: 15px; padding: 24px;">
                    Are you sure you want to permanently delete this appointment record? This action cannot be undone.
                </div>
                <div class="modal-footer border-0 pt-0" style="padding: 0 24px 24px;">
                    <button type="button" class="btn btn-outline-light rounded-pill px-4" data-bs-dismiss="modal" style="border-color: rgba(255,255,255,0.2);">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
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

        function sendReminder(email, name, date, time) {
            // Pre-fill the modal fields
            document.getElementById('reminderEmail').value = email;
            document.getElementById('reminderSubject').value = 'Appointment Reminder – Icon Dental Wembley';
            document.getElementById('reminderBody').value =
                'Dear ' + name + ',\n\n' +
                'This is a friendly reminder from Icon Dental Wembley about your upcoming appointment.\n\n' +
                '📅 Date: ' + date + '\n' +
                '🕐 Preferred Time: ' + time + '\n\n' +
                'Please arrive 5–10 minutes early and bring any relevant documents or referral letters.\n\n' +
                'If you need to reschedule or have any questions, please do not hesitate to call us or reply to this email.\n\n' +
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

        document.getElementById('viewAppointmentModal').addEventListener('show.bs.modal', function(e) {
            const b = e.relatedTarget;
            document.getElementById('vName').textContent = b.dataset.name;
            document.getElementById('vEmail').textContent = b.dataset.email;
            document.getElementById('vPhone').textContent = b.dataset.phone;
            document.getElementById('vDate').textContent = b.dataset.date;
            document.getElementById('vTime').textContent = b.dataset.time;
            document.getElementById('vReason').textContent = b.dataset.reason;
            document.getElementById('vStatus').textContent = b.dataset.status;
            document.getElementById('vNotes').textContent = b.dataset.notes;
        });
    </script>
</x-layouts.admin>
