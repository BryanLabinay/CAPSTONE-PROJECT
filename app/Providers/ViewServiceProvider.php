<?php

namespace App\Providers;

use App\Models\Appointment;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        // Using a closure based composer
        View::composer('layouts.navigation', function ($view) {
            // Fetch notifications with status 'Approved' and 'Cancelled'
            $notifications = Appointment::whereIn('status', ['Approved', 'Cancelled'])->get();

            // Filter out read notifications
            $unreadNotifications = $notifications->reject(function ($notification) {
                return $notification->read;
            });

            // Count the number of unread notifications
            $unreadCount = $unreadNotifications->count();

            // Pass notifications and unread count to the view
            $view->with([
                'notifications' => $unreadNotifications,
                'unreadCount' => $unreadCount
            ]);
        });
    }
}
