<?php

namespace App\Providers;

use App\Models\manage_category;
use Illuminate\Support\ServiceProvider;
//use App\Models\manage_category;

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
        view()->composer('*', function ($view) {
        $view->with('global_categories', manage_category::all());
    });
    }
}
