<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SmileStory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class SmileStoryAdminController extends Controller
{
    public function index(): View
    {
        $stories = SmileStory::orderBy('sort_order')->get();
        return view('admin.stories.index', compact('stories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'patient_name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:255'],
            'story_body' => ['required', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        SmileStory::create($validated);
        Cache::forget('cms.smile_stories');

        return redirect()->back()->with('success', 'Smile story added successfully.');
    }

    public function edit(SmileStory $story): View
    {
        return view('admin.stories.edit', compact('story'));
    }

    public function update(Request $request, SmileStory $story): RedirectResponse
    {
        $validated = $request->validate([
            'patient_name' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'quote' => ['required', 'string', 'max:255'],
            'story_body' => ['required', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->has('is_published');
        $story->update($validated);
        Cache::forget('cms.smile_stories');

        return redirect()->route('admin.stories.index')->with('success', 'Smile story updated successfully.');
    }

    public function destroy(SmileStory $story): RedirectResponse
    {
        $story->delete();
        Cache::forget('cms.smile_stories');

        return redirect()->back()->with('success', 'Smile story deleted successfully.');
    }
}
