<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = auth()->user()->role;

        // Periksa apakah user memiliki role yang diperlukan
        if (!in_array($userRole, $roles)) {
            return redirect()->route('unauthorized'); // Alihkan ke halaman unauthorized
        }

        return $next($request);
    }

}

