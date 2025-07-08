<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            abort(403, 'Access Denied: You are not logged in.');
        }

        $user = Auth::user();
        if ($user->mitra->status_verifikasi !== 'Terverifikasi') {
            abort(403, 'Access Denied: Your account is not verified.');
        }

        return $next($request);
    }
}
