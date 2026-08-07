<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use App\Models\TreatmentCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class TreatmentAdminController extends Controller
{
    public function index(): View
    {
        $categories = TreatmentCategory::with('treatments')->get();
        return view('admin.treatments.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:treatment_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:treatments,slug'],
            'short_desc' => ['nullable', 'string', 'max:1000'],
            'full_content' => ['nullable', 'string'],
            'icon_class' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        Treatment::create($validated);
        Cache::forget('cms.treatments.categories');

        return redirect()->back()->with('success', 'Treatment created successfully.');
    }

    public function edit(Treatment $treatment): View
    {
        $categories = TreatmentCategory::all();
        return view('admin.treatments.edit', compact('treatment', 'categories'));
    }

    public function update(Request $request, Treatment $treatment): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'exists:treatment_categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'short_desc' => ['nullable', 'string', 'max:1000'],
            'full_content' => ['nullable', 'string'],
            'icon_class' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->has('is_published');
        $treatment->update($validated);
        Cache::forget('cms.treatments.categories');

        return redirect()->route('admin.treatments.index')->with('success', 'Treatment updated successfully.');
    }

    public function destroy(Treatment $treatment): RedirectResponse
    {
        $treatment->delete();
        Cache::forget('cms.treatments.categories');

        return redirect()->back()->with('success', 'Treatment deleted successfully.');
    }
}
