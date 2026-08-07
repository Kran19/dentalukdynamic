<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingRequest;
use App\Models\Appointment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookingController extends Controller
{
    public function create(): View
    {
        return view('pages.book-online');
    }

    public function store(StoreBookingRequest $request): RedirectResponse
    {
        Appointment::create($request->validated());

        return redirect()->back()->with('success', 'Thank you! Your appointment request has been received. Our reception team will contact you shortly to confirm.');
    }
}
