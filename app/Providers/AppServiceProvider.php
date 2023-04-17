<?php

namespace App\Providers;
use Laravel\Fortify\Fortify;
use Illuminate\Contracts\View\View;
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
        //
 
        app()->setLocale(request()->segment(1));
        view()->composer(['includes.header','includes.category_list','index'],'App\Http\ViewComposers\CategoryComposer');

   
    }
}
