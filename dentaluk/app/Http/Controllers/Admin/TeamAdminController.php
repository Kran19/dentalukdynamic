<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TeamAdminController extends Controller
{
    public function index(Request $request): View
    {
        $query = TeamMember::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhere('gdc_number', 'like', "%{$search}%");
            });
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        $members = $query->orderBy('sort_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'gdc_number' => ['nullable', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        TeamMember::create($validated);
        Cache::forget('cms.team.members');

        return redirect()->back()->with('success', 'Team member profile created successfully.');
    }

    public function update(Request $request, TeamMember $member): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'gdc_number' => ['nullable', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:2000'],
            'image_path' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->has('is_active');
        $member->update($validated);
        Cache::forget('cms.team.members');

        return redirect()->back()->with('success', 'Team member profile updated successfully.');
    }

    public function destroy(TeamMember $member): RedirectResponse
    {
        $member->delete();
        Cache::forget('cms.team.members');

        return redirect()->back()->with('success', 'Team member profile deleted.');
    }
}
