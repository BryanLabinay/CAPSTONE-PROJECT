<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;

class AdminCTRL extends Controller
{

    // Admin Calendar
    public function calendar()
    {
        return view('Admin.calendar');
    }
    // Add event
    public function addevent()
    {
        return view('Admin.add-activity.add-event');
    }

    // Store Event
    public function storeevent(EventFormRequest $request)
    {
        $data = new Event();
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imgName = time() . '_' . $img->getClientOriginalName();
            $img->move(public_path('uploads'), $imgName);
            $data->img = $imgName;
        }

        $data->save();
        return redirect()->back()->with('data', $data);
    }
}
