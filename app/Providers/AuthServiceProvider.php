<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return $user->role->name === 'Admin';
        });

        Gate::define('teacher', function ($user) {
            return $user->role->name === 'Professor';
        });

        Gate::define('student', function ($user) {
            return $user->role->name === 'Aluno';
        });
    }
}
