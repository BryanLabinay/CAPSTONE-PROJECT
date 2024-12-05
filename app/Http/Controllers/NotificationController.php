<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use JeroenNoten\LaravelAdminLte\View\Components\Widget\Card;

class NotificationController extends Controller
{
    public function markNotificationAsRead($notificationId)
    {
        // Get the authenticated user ID
        $userId = Auth::id();

        // Find the notification by ID
        $notification = DB::table('notifications')
            ->where('id', $notificationId)
            ->where('notifiable_id', $userId)
            ->where('notifiable_type', 'App\Models\User') // Ensure it's associated with the User model
            ->first();

        if ($notification && is_null($notification->read_at)) {
            // Update the `read_at` column directly in the database
            DB::table('notifications')
                ->where('id', $notificationId)
                ->update(['read_at' => Carbon::now()]);

            return response()->json(['success' => 'Notification marked as read']);
        }

        return response()->json(['error' => 'Notification not found or already read'], 404);
    }


    public function getUnreadCount()
    {
        $userId = Auth::id();

        // Get unread notifications count
        $unreadCount = DB::table('notifications')
            ->where('notifiable_id', $userId)
            ->whereNull('read_at')
            ->count();

        return response()->json(['unreadCount' => $unreadCount]);
    }
}
