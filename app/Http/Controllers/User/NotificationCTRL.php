<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class NotificationCTRL extends Controller
{
    public function notification()
    {

        $notifications = Appointment::all(); // Example query to fetch unread notifications
        // $notifications = Appointment::where('status', 'unread')->get(); // Example query to fetch unread notifications
        return view('layouts.app', compact('notifications'));
    }
}
