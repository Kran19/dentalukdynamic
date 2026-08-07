<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReferralAdminController extends Controller
{
    public function index(): View
    {
        $referrals = Referral::latest()->paginate(15);
        return view('admin.referrals.index', compact('referrals'));
    }

    public function updateStatus(Request $request, Referral $referral): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:pending,contacted,in_treatment,completed,archived'],
            'admin_notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $referral->update($validated);

        return redirect()->back()->with('success', 'Referral status updated.');
    }

    public function destroy(Referral $referral): RedirectResponse
    {
        $referral->delete();
        return redirect()->back()->with('success', 'Referral record deleted.');
    }
}
