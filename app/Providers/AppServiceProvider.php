<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap(); // For Bootstrap 5
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
            ->subject('Verify Email Address')
            ->greeting('Verify your email address')
            ->line('To complete your profile and start using website features, you\'ll need to verify your email address.')
            ->action('Verify Now', $url)
            ->salutation('Dinas Peternakan Kabupaten Sragen');
        });
    }
}
