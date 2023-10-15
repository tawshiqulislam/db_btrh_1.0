<?php

namespace App\Providers;



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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('super_admin', function () {

            if (User::isSuperAdmin()) {
                return true;
            }
        });

        Gate::define('admin', function () {

            if (User::isAdmin()) {
                return true;
            }
        });
        Gate::define('user', function () {

            if (User::isUser()) {
                return true;
            }
        });

        Gate::define('super_admin_admin', function () {
            if (User::isSuperAdmin() || User::isAdmin()) {
                return true;
            }
        });

        Gate::define('super_admin_admin_user', function () {
            if (User::isSuperAdmin() || User::isAdmin() || User::isUser()) {
                return true;
            }
        });

        Gate::define('no_one', function () {
            if (User::isSuperAdmin() && User::isAdmin() && User::isUser()) {
                return true;
            }
        });
    }
}
