<?php

namespace App\Providers;

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
        $this->app
            ->when(\App\Http\Controllers\UserPassportController::class)
            ->needs(\App\Contracts\PassportOperations::class)
            ->give(\App\Implementations\UserPassport::class);

        $this->app
            ->when(\App\Http\Controllers\UmpairPassportController::class)
            ->needs(\App\Contracts\PassportOperations::class)
            ->give(\App\Implementations\UmpairPassport::class);

        $this->app
            ->when(\App\Http\Controllers\AdminPassportController::class)
            ->needs(\App\Contracts\PassportOperations::class)
            ->give(\App\Implementations\AdminPassport::class);
    }
}
