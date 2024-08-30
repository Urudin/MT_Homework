<?php

namespace App\Providers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('owns-pet', function (User $user, Pet $pet) {
            return $user->id === $pet->user_id;
        });
    }
}
