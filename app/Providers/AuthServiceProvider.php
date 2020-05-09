<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Auth;
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

        Gate::define('create-phone' , function ($user) {
            return $user->id == 1;
            // return $user->isAdmin;
            // Response::allow();
            // Response::deny('You must be a super administrator.');
        });
        Gate::define('edit-phone' , function ($user){
            return $user->id == 1;
        });
        Gate::define('delete-phone' , function ($user) {
            return $user->id == 1;
        });
    }
}
