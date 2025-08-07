<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        app()->booted(function () {
            if (Auth::check()) {
                Reservation::where('statut', 'en_attente')
                    ->where('created_at', '<', now()->subHours(48))
                    ->update(['statut' => 'annulee']);
            }
        });
    }
}
