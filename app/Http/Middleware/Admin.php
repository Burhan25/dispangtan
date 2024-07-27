<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
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
            if (auth()->user()->role == 'admin') {
                return $next($request);
            }
        }
     // Jika pengguna tidak memiliki akses admin, redirect ke dashboard dokter dengan pesan error
        return redirect()->route('dokter.dashboard')->with('error', "You don't have admin access.");
    }
}
