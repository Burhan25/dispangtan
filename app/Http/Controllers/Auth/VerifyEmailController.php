<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) { // Cek apakah email pengguna sudah terverifikasi
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');// Jika sudah, redirect ke halaman beranda dengan query parameter 'verified=1'
        }

        if ($request->user()->markEmailAsVerified()) { // Tandai email pengguna sebagai terverifikasi
            event(new Verified($request->user()));// Jika berhasil, kirimkan event bahwa email telah terverifikasi
        }

        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');// Redirect ke halaman beranda dengan query parameter 'verified=1'
    }
}
