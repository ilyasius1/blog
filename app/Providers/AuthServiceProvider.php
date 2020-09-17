<?php

namespace App\Providers;

use App\Models\Role;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**Является ли пользователь админом*/
        Gate::define('admin', function ($user){
            return $user->isAdmin()
                ? Response::allow()
                : Response::deny('Ты не пройдешь!');
        });


    }
}
