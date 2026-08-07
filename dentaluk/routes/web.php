<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AppointmentAdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeeAdminController;
use App\Http\Controllers\Admin\LegalPageAdminController;
use App\Http\Controllers\Admin\MediaAdminController;
use App\Http\Controllers\Admin\PageAdminController;
use App\Http\Controllers\Admin\ReferralAdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SmileStoryAdminController;
use App\Http\Controllers\Admin\TeamAdminController;
use App\Http\Controllers\Admin\TreatmentAdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LegalPageController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Pure Laravel Web Routes - Icon Dental Wembley
|--------------------------------------------------------------------------
*/

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Routes
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, 'index'])->name('index');
    Route::get('/meet-the-team', [AboutController::class, 'team'])->name('team');
    Route::get('/smile-stories', [AboutController::class, 'stories'])->name('stories');
});

// Treatments Routes
Route::prefix('treatments')->name('treatments.')->group(function () {
    Route::get('/', [TreatmentController::class, 'index'])->name('index');
    Route::get('/check-my-teeth', [TreatmentController::class, 'check'])->name('check');
    Route::get('/repair-my-teeth', [TreatmentController::class, 'repair'])->name('repair');
    Route::get('/replace-my-teeth', [TreatmentController::class, 'replace'])->name('replace');
    Route::get('/enhance-my-teeth', [TreatmentController::class, 'enhance'])->name('enhance');
    Route::get('/facial-aesthetics', [TreatmentController::class, 'facial'])->name('facial');
    Route::get('/bone-grafting', [TreatmentController::class, 'boneGrafting'])->name('bone-grafting');
    Route::get('/cosmetic-dentistry', [TreatmentController::class, 'cosmetic'])->name('cosmetic');
    Route::get('/general-dentistry', [TreatmentController::class, 'general'])->name('general');
});

// Fees Route
Route::get('/fees-membership', [FeeController::class, 'index'])->name('fees');

// For Dentists & Referrals
Route::get('/for-dentists', [DentistController::class, 'index'])->name('dentists');
Route::get('/referral-form', [ReferralController::class, 'create'])->name('referral.create');
Route::post('/referral-form', [ReferralController::class, 'store'])->name('referral.store');

// Book Online
Route::get('/book-online', [BookingController::class, 'create'])->name('booking.create');
Route::post('/book-online', [BookingController::class, 'store'])->name('booking.store');

// Contact Us
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');

// Public Legal Pages
Route::get('/complaints', fn () => app(LegalPageController::class)->show('complaints'))->name('legal.complaints');
Route::get('/data-protection', fn () => app(LegalPageController::class)->show('data-protection'))->name('legal.data-protection');
Route::get('/cookies-policy', fn () => app(LegalPageController::class)->show('cookies-policy'))->name('legal.cookies');
Route::get('/privacy-policy', fn () => app(LegalPageController::class)->show('privacy-policy'))->name('legal.privacy');
Route::get('/terms-of-use', fn () => app(LegalPageController::class)->show('terms-of-use'))->name('legal.terms');
Route::get('/legal/{slug}', [LegalPageController::class, 'show'])->name('legal.show');

/*
|--------------------------------------------------------------------------
| Admin Enterprise CMS Control Panel Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected CMS Modules
    Route::middleware('admin.auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Global Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        // CMS Page Sections Manager
        Route::get('/pages', [PageAdminController::class, 'index'])->name('pages.index');
        Route::get('/pages/sections/{section}/edit', [PageAdminController::class, 'editSection'])->name('pages.sections.edit');
        Route::put('/pages/sections/{section}', [PageAdminController::class, 'updateSection'])->name('pages.sections.update');
        Route::delete('/pages/sections/{section}', [PageAdminController::class, 'destroySection'])->name('pages.sections.destroy');

        // Treatments CMS
        Route::get('/treatments', [TreatmentAdminController::class, 'index'])->name('treatments.index');
        Route::post('/treatments', [TreatmentAdminController::class, 'store'])->name('treatments.store');
        Route::get('/treatments/{treatment}/edit', [TreatmentAdminController::class, 'edit'])->name('treatments.edit');
        Route::put('/treatments/{treatment}', [TreatmentAdminController::class, 'update'])->name('treatments.update');
        Route::delete('/treatments/{treatment}', [TreatmentAdminController::class, 'destroy'])->name('treatments.destroy');

        // Smile Stories CMS
        Route::get('/smile-stories', [SmileStoryAdminController::class, 'index'])->name('stories.index');
        Route::post('/smile-stories', [SmileStoryAdminController::class, 'store'])->name('stories.store');
        Route::get('/smile-stories/{story}/edit', [SmileStoryAdminController::class, 'edit'])->name('stories.edit');
        Route::put('/smile-stories/{story}', [SmileStoryAdminController::class, 'update'])->name('stories.update');
        Route::delete('/smile-stories/{story}', [SmileStoryAdminController::class, 'destroy'])->name('stories.destroy');

        // Legal Pages CMS
        Route::get('/legal', [LegalPageAdminController::class, 'index'])->name('legal.index');
        Route::get('/legal/{page}/edit', [LegalPageAdminController::class, 'edit'])->name('legal.edit');
        Route::put('/legal/{page}', [LegalPageAdminController::class, 'update'])->name('legal.update');

        // Media Library CMS
        Route::get('/media', [MediaAdminController::class, 'index'])->name('media.index');
        Route::post('/media', [MediaAdminController::class, 'store'])->name('media.store');
        Route::delete('/media/{media}', [MediaAdminController::class, 'destroy'])->name('media.destroy');

        // Team Members CMS
        Route::get('/team-members', [TeamAdminController::class, 'index'])->name('team.index');
        Route::post('/team-members', [TeamAdminController::class, 'store'])->name('team.store');
        Route::put('/team-members/{member}', [TeamAdminController::class, 'update'])->name('team.update');
        Route::delete('/team-members/{member}', [TeamAdminController::class, 'destroy'])->name('team.destroy');

        // Fee Guide CMS
        Route::get('/fee-items', [FeeAdminController::class, 'index'])->name('fees.index');
        Route::post('/fee-items', [FeeAdminController::class, 'store'])->name('fees.store');
        Route::put('/fee-items/{fee}', [FeeAdminController::class, 'update'])->name('fees.update');
        Route::delete('/fee-items/{fee}', [FeeAdminController::class, 'destroy'])->name('fees.destroy');

        // Appointments Portal
        Route::get('/appointments', [AppointmentAdminController::class, 'index'])->name('appointments.index');
        Route::patch('/appointments/{appointment}', [AppointmentAdminController::class, 'updateStatus'])->name('appointments.status');
        Route::delete('/appointments/{appointment}', [AppointmentAdminController::class, 'destroy'])->name('appointments.destroy');

        // Referrals Portal
        Route::get('/referrals', [ReferralAdminController::class, 'index'])->name('referrals.index');
        Route::patch('/referrals/{referral}', [ReferralAdminController::class, 'updateStatus'])->name('referrals.status');
        Route::delete('/referrals/{referral}', [ReferralAdminController::class, 'destroy'])->name('referrals.destroy');
    });
});

// Legacy 301 Permanent Redirects
Route::get('/index.php', fn () => redirect()->route('home', [], 301));
Route::get('/about.php', fn () => redirect()->route('about.index', [], 301));
Route::get('/about/meet-the-team.php', fn () => redirect()->route('about.team', [], 301));
Route::get('/about/smile-stories.php', fn () => redirect()->route('about.stories', [], 301));
Route::get('/treatments.php', fn () => redirect()->route('treatments.index', [], 301));
Route::get('/treatments/check-my-teeth.php', fn () => redirect()->route('treatments.check', [], 301));
Route::get('/treatments/repair-my-teeth.php', fn () => redirect()->route('treatments.repair', [], 301));
Route::get('/treatments/replace-my-teeth.php', fn () => redirect()->route('treatments.replace', [], 301));
Route::get('/treatments/enhance-my-teeth.php', fn () => redirect()->route('treatments.enhance', [], 301));
Route::get('/treatments/facial-aesthetics.php', fn () => redirect()->route('treatments.facial', [], 301));
Route::get('/treatments/bone-grafting.php', fn () => redirect()->route('treatments.bone-grafting', [], 301));
Route::get('/treatments/cosmetic-dentistry.php', fn () => redirect()->route('treatments.cosmetic', [], 301));
Route::get('/treatments/general-dentistry.php', fn () => redirect()->route('treatments.general', [], 301));
Route::get('/fees-membership.php', fn () => redirect()->route('fees', [], 301));
Route::get('/for-dentists.php', fn () => redirect()->route('dentists', [], 301));
Route::get('/referral-form.php', fn () => redirect()->route('referral.create', [], 301));
Route::get('/book-online.php', fn () => redirect()->route('booking.create', [], 301));
Route::get('/contact-us.php', fn () => redirect()->route('contact', [], 301));
