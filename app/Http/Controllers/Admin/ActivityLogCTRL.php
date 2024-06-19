<?php

namespace App\Http\Controllers\Admin;

use App\Models\Activity;
use App\Models\CommanList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityLogCTRL extends Controller
{
    public function index()
    {
        // Get paginated activity logs, 10 per page
        $logs = Activity::latest()->paginate(10);
        // Pass the paginated logs to the view
        return view('Admin.activity-logs', compact('logs'));
    }
}
