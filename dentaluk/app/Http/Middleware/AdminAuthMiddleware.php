<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please login to access the Admin CMS Panel.');
        }

        if (Auth::user()->status !== 'active') {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Your admin account has been deactivated.');
        }

        return $next($request);
    }
}
