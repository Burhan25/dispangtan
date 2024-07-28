<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Menangani request yang masuk.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna yang terautentikasi memiliki atribut 'role'
        if (isset(auth()->user()->role)) {
            if (auth()->user()) {
                return $next($request);
            }
        }

        // Jika pengguna tidak memiliki akses dokter, redirect ke halaman konsultasi dengan pesan error
        return redirect('/login')->with('error', "You don't have dokter access.");
    }
}
