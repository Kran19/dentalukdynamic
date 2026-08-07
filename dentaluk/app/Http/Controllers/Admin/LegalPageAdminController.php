<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LegalPageAdminController extends Controller
{
    public function index(): View
    {
        $pages = LegalPage::all();
        return view('admin.legal.index', compact('pages'));
    }

    public function edit(LegalPage $page): View
    {
        return view('admin.legal.edit', compact('page'));
    }

    public function update(Request $request, LegalPage $page): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $validated['is_published'] = $request->has('is_published');
        $page->update($validated);

        return redirect()->route('admin.legal.index')->with('success', 'Legal policy page updated successfully.');
    }
}
