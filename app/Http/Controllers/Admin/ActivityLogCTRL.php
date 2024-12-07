<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
// use App\Models\CommanList;
// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityLogCTRL extends Controller
{
    public function index()
    {

        $activity_types = [
            'App\Models\User' => 'User Module',
            'App\Models\Event' => 'Event Module',
            'App\Models\Appointment' => 'Appointment Module',
            'App\Models\Blog' => 'Blog Module',
            'App\Models\Service' => 'Service Module',
            'App\Models\Contact' => 'Contact Module',
        ];

        $logs = Activity::with('subject', 'causer')->orderBy('created_at', 'desc')->get();
        return view('Admin.activity-logs', compact('logs', 'activity_types'));
    }
}
