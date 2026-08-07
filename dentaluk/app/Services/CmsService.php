<?php

namespace App\Services;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\Setting;
use App\Models\SmileStory;
use App\Models\Treatment;
use App\Models\TreatmentCategory;
use Illuminate\Support\Facades\Cache;

class CmsService
{
    public static function getPageSection(string $pageSlug, string $sectionKey): ?PageSection
    {
        return Cache::remember("page.{$pageSlug}.section.{$sectionKey}", 3600, function () use ($pageSlug, $sectionKey) {
            $page = Page::where('slug', $pageSlug)->first();
            if (!$page) return null;
            return PageSection::where('page_id', $page->id)
                ->where('section_key', $sectionKey)
                ->where('is_active', true)
                ->first();
        });
    }

    public static function getSetting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }

    public static function getTreatmentsWithCategories()
    {
        return Cache::remember("cms.treatments.categories", 3600, function () {
            return TreatmentCategory::with(['treatments' => fn ($q) => $q->where('is_published', true)])
                ->orderBy('sort_order')
                ->get();
        });
    }

    public static function getSmileStories()
    {
        return Cache::remember("cms.smile_stories", 3600, function () {
            return SmileStory::where('is_published', true)->orderBy('sort_order')->get();
        });
    }
}
