<?php

namespace App\Http\Controllers;

use App\Models\FeeItem;
use Illuminate\View\View;

class FeeController extends Controller
{
    public function index(): View
    {
        $fees = FeeItem::orderBy('sort_order')->get();

        return view('pages.fees-membership', compact('fees'));
    }
}
