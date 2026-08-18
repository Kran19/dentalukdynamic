<x-mail::message>
# New Online Appointment Request

A new appointment request has been submitted through the website. Here are the details:

<x-mail::panel>
**Patient Details:**
- **Full Name:** {{ $appointment->full_name }}
- **Email Address:** {{ $appointment->email }}
- **Phone Number:** {{ $appointment->phone }}

**Appointment Preferences:**
- **Preferred Date:** {{ $appointment->preferred_date ? $appointment->preferred_date->format('d/m/Y') : 'Not specified' }}
- **Preferred Time:** {{ $appointment->preferred_time ?? 'Not specified' }}
- **Reason for Visit:** {{ $appointment->reason_for_visit }}
</x-mail::panel>

@if($appointment->additional_notes)
**Additional Notes:**
{{ $appointment->additional_notes }}
@endif

<x-mail::button :url="route('admin.appointments.index')">
View in Admin Portal
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
