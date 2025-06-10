<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('web')->check()) {
            return redirect()->route('login');
        }

        // Pastikan user memiliki role 'admin'
        if (Auth::guard('web')->user()->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}