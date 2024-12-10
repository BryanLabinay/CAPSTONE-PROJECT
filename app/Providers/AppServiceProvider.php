<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        View::share('user', Auth::user());

        View::share('unreadCount', $this->getUnreadNotificationCount());

        Schema::defaultStringLength(191);
    }

    /**
     * Get unread notification count for the authenticated user.
     *
     * @return int
     */
    private function getUnreadNotificationCount()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $unreadNotifications = $user->unreadNotifications;

            // Debug output to check if notifications are being loaded properly
            dd($unreadNotifications);  // Check if unread notifications exist
            return $unreadNotifications->count();
        }

        return 0; // Return 0 if no user is authenticated
    }
}


// Paginator::useBootstrap();