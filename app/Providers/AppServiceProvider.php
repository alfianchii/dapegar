<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;

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
        Gate::define("superadmin", fn (User $user) => $user->role == "superadmin");
        Gate::define("officer", fn (User $user) => $user->role === "officer");

        Model::preventLazyLoading(!app()->environment('production'));
    }
}
