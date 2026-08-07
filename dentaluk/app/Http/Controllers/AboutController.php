<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Services\CmsService;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $valuesSection = CmsService::getPageSection('about', 'values');
        return view('pages.about.index', compact('valuesSection'));
    }

    public function team(): View
    {
        $management = TeamMember::where('category', 'Management')->orderBy('sort_order')->get();
        $dentists = TeamMember::where('category', 'Dentists')->orderBy('sort_order')->get();
        $hygienists = TeamMember::where('category', 'Hygienists')->orderBy('sort_order')->get();
        $nurses = TeamMember::where('category', 'Nurses')->orderBy('sort_order')->get();
        $frontOfHouse = TeamMember::where('category', 'FrontOfHouse')->orderBy('sort_order')->get();

        return view('pages.about.meet-the-team', compact('management', 'dentists', 'hygienists', 'nurses', 'frontOfHouse'));
    }

    public function stories(): View
    {
        $stories = CmsService::getSmileStories();
        return view('pages.about.smile-stories', compact('stories'));
    }
}
