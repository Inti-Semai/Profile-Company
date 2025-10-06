<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if admin is authenticated using admin guard
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login')->withErrors([
                'error' => 'Please login to access admin panel.'
            ]);
        }

        return $next($request);
    }
}
