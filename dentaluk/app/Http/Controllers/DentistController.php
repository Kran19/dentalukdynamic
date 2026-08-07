<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DentistController extends Controller
{
    public function index(): View
    {
        return view('pages.for-dentists');
    }
}
