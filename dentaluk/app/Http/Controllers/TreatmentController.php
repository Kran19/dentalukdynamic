<?php

namespace App\Http\Controllers;

use App\Models\TreatmentCategory;
use App\Services\CmsService;
use Illuminate\View\View;

class TreatmentController extends Controller
{
    public function index(): View
    {
        $categories = CmsService::getTreatmentsWithCategories();
        return view('pages.treatments.index', compact('categories'));
    }

    public function check(): View
    {
        $category = TreatmentCategory::where('slug', 'check-my-teeth')->with('treatments')->first();
        return view('pages.treatments.check-my-teeth', compact('category'));
    }

    public function repair(): View
    {
        $category = TreatmentCategory::where('slug', 'repair-my-teeth')->with('treatments')->first();
        return view('pages.treatments.repair-my-teeth', compact('category'));
    }

    public function replace(): View
    {
        $category = TreatmentCategory::where('slug', 'replace-my-teeth')->with('treatments')->first();
        return view('pages.treatments.replace-my-teeth', compact('category'));
    }

    public function enhance(): View
    {
        $category = TreatmentCategory::where('slug', 'enhance-my-teeth')->with('treatments')->first();
        return view('pages.treatments.enhance-my-teeth', compact('category'));
    }

    public function facial(): View
    {
        $category = TreatmentCategory::where('slug', 'facial-aesthetics')->with('treatments')->first();
        return view('pages.treatments.facial-aesthetics', compact('category'));
    }

    public function boneGrafting(): View
    {
        return view('pages.treatments.bone-grafting');
    }

    public function cosmetic(): View
    {
        return view('pages.treatments.cosmetic-dentistry');
    }

    public function general(): View
    {
        return view('pages.treatments.general-dentistry');
    }
}
