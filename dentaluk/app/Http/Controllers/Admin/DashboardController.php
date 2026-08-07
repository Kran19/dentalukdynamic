<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Referral;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $recentAppointments = Appointment::oldest()->take(10)->get();
        $recentReferrals = Referral::oldest()->take(10)->get();
        $pendingAppointmentsCount = Appointment::where('status', 'pending')->count();
        $pendingReferralsCount = Referral::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'recentAppointments',
            'recentReferrals',
            'pendingAppointmentsCount',
            'pendingReferralsCount'
        ));
    }
}
