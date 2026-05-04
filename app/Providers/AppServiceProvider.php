<?php

namespace App\Providers;

// use App\Models\Nilai;
// use App\Observers\NilaiObserver;
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
        // Nilai::observe(NilaiObserver::class);
    }
}
