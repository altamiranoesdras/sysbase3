<?php

namespace App\Providers;

use App\Models\Option;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            return $user->hasRole(Role::DEVELOPER) || $user->hasRole(Role::SUPERADMIN) ? true : null;
        });

        Gate::define('access_option', function(User $user) {

            $rutaActual = request()->route()->getName();

            //si la ruta actual no esta en las opciones o la ruta actual no esta asignada al usuario
            return (!Option::all()->contains('ruta',$rutaActual) || $user->getAllOptions()->contains('ruta',$rutaActual));

        });

    }
}
