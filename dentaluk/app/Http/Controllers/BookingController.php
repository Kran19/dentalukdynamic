<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use App\Mail\NewAppointmentNotification;

class BookingController extends Controller
{
    public function create(): View
    {
        return view('pages.book-online');
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        $appointment = Appointment::create($request->validated());

        // Send email notification to reception
        Mail::to('reception@icondentalwembley.co.uk')->send(new NewAppointmentNotification($appointment));

        return redirect()->back()->with('success', 'Thank you! Your appointment request has been received. Our reception team will contact you shortly to confirm.');
    }
}
