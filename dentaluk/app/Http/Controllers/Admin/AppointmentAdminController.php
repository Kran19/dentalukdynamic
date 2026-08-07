<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentAdminController extends Controller
{
    public function index(): View
    {
        $appointments = Appointment::latest()->paginate(15);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function updateStatus(Request $request, Appointment $appointment): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:pending,confirmed,completed,cancelled'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $appointment->update($validated);

        return redirect()->back()->with('success', 'Appointment status updated.');
    }

    public function destroy(Appointment $appointment): RedirectResponse
    {
        $appointment->delete();
        return redirect()->back()->with('success', 'Appointment record deleted.');
    }
}
