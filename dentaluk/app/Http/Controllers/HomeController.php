<?php

namespace App\Http\Controllers;

use App\Services\CmsService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $heroSection = CmsService::getPageSection('home', 'hero');
        $smileStories = CmsService::getSmileStories();
        $treatmentCategories = CmsService::getTreatmentsWithCategories();

        return view('pages.home', compact('heroSection', 'smileStories', 'treatmentCategories'));
    }
}
