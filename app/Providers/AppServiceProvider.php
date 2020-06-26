<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $isAuth = true;
        View::share('title', 'Default title');

        View::composer('*', function($view) use($isAuth)
        {
            $view->with('name','authorized user');
        });
        //
    }
}
