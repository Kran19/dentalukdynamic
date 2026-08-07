<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeeItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class FeeAdminController extends Controller
{
    public function index(Request $request): View
    {
        $query = FeeItem::query();

        if ($search = $request->input('search')) {
            $query->where('treatment_item', 'like', "%{$search}%");
        }

        $fees = $query->orderBy('sort_order')->get();
        return view('admin.fees.index', compact('fees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'treatment_item' => ['required', 'string', 'max:255'],
            'nhs_fee' => ['nullable', 'string', 'max:100'],
            'private_fee' => ['nullable', 'string', 'max:100'],
            'denplan_fee' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        FeeItem::create($validated);
        Cache::forget('cms.fee.items');

        return redirect()->back()->with('success', 'Fee rate item created successfully.');
    }

    public function update(Request $request, FeeItem $fee): RedirectResponse
    {
        $validated = $request->validate([
            'treatment_item' => ['required', 'string', 'max:255'],
            'nhs_fee' => ['nullable', 'string', 'max:100'],
            'private_fee' => ['nullable', 'string', 'max:100'],
            'denplan_fee' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->has('is_active');
        $fee->update($validated);
        Cache::forget('cms.fee.items');

        return redirect()->back()->with('success', 'Fee rate item updated successfully.');
    }

    public function destroy(FeeItem $fee): RedirectResponse
    {
        $fee->delete();
        Cache::forget('cms.fee.items');

        return redirect()->back()->with('success', 'Fee rate item deleted.');
    }
}
