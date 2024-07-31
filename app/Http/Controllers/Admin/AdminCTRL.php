<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;
use Illuminate\Support\Facades\DB;

class AdminCTRL extends Controller
{

    // Admin Calendar
    public function calendar(Request $request)
    {
        $selectedDate = $request->input('date', date('Y-m-d'));
        $currentMonth = $request->input('month', date('m')) - 1;
        $currentYear = $request->input('year', date('Y'));

        // Get all appointments
        $appointments = DB::table('appointments')->get();

        // Filter appointments for the selected month
        $appointmentCounts = $appointments->filter(function ($item) use ($currentYear, $currentMonth) {
            return (new \DateTime($item->date))->format('Y-m') === "$currentYear-" . str_pad($currentMonth + 1, 2, '0', STR_PAD_LEFT);
        })->groupBy(function ($item) {
            return (new \DateTime($item->date))->format('Y-m-d');
        })->map(function ($group) {
            return $group->count();
        });

        return view('Admin.calendar', [
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'selectedDate' => $selectedDate,
            'appointmentCounts' => $appointmentCounts,
            'appointments' => $appointments
        ]);
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
