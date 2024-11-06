<?php

namespace App\Providers;

use App\Contracts\IGuest;
use App\Services\GuestService;
use Illuminate\Support\ServiceProvider;

class GuestProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(IGuest::class, GuestService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
