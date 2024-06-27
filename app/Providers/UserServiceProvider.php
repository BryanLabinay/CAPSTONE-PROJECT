<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
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
    public function boot()
    {
        // Sharing user data with all views
        View::composer('*', function ($view) {
            // Here you can fetch the user data, for example, the authenticated user
            $user_image = auth()->user();

            // You can also get a specific user if needed
            // $user = User::find(1);

            $view->with('user_image', $user_image);
        });
    }
}
