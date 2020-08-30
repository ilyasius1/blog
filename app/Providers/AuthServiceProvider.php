<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('post.create', function ($user){
            return ($user->can_create == 1 || $user->is_admin);
        });
        Gate::define('post.edit', function ($user, $post){
            return ($user->id == $post->user->id || $user->can_edit || $user->is_admin);
        });

        Gate::define('post.delete', function ($user, $post){
            return ($user->id == $post->user->id || $user->can_delete || $user->is_admin);
        });

        //
    }
}
