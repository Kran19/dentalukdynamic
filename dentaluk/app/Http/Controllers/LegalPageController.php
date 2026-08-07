<?php

namespace App\Http\Controllers;

use App\Models\LegalPage;
use Illuminate\View\View;

class LegalPageController extends Controller
{
    public function show(string $slug): View
    {
        $page = LegalPage::where('slug', $slug)->where('is_published', true)->firstOrFail();
        return view('pages.legal.show', compact('page'));
    }
}
