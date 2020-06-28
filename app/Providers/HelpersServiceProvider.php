<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require app_path('Includes/helpers.php');
        $this->app->bind(
            'app\Includes\Interfaces\MyMenuInterface',
            'MyMenu'
        );
    }
}
