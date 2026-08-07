<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\PageSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PageAdminController extends Controller
{
    public function index(): View
    {
        $pages = Page::with('sections')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function editSection(PageSection $section): View
    {
        return view('admin.pages.edit-section', compact('section'));
    }

    public function updateSection(Request $request, PageSection $section): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'content' => ['nullable', 'array'],
        ]);

        $section->update($validated);

        Cache::forget("page.{$section->page->slug}.section.{$section->section_key}");

        return redirect()->route('admin.pages.index')->with('success', 'Page section content updated successfully.');
    }
}
