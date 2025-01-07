<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventFormRequest;

class AdminCTRL extends Controller
{

    // Admin Calendar

    public function calendar(Request $request)
    {
        // Get the current month and year from the request, or use the current date if not provided
        $currentMonth = $request->input('month', date('m')) - 1;
        $currentYear = $request->input('year', date('Y'));

        // Adjust for year boundary when navigating to previous or next month
        if ($currentMonth < 0) {
            $currentMonth = 11; // December
            $currentYear--;
        } elseif ($currentMonth > 11) {
            $currentMonth = 0; // January
            $currentYear++;
        }

        // Set the selected date to the current date or keep it based on the filter
        $selectedDate = $request->input('selectedDate', date('Y-m-d'));

        // Other filters (status and appointment type)
        $status = $request->input('status', '');
        $appointmentType = $request->input('appointment', '');

        // Fetch appointments and apply filters
        $appointments = DB::table('appointments')
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($appointmentType, function ($query, $appointmentType) {
                return $query->where('appointment', $appointmentType);
            })
            ->whereNotIn('status', ['cancelled', 'pending']) // Exclude cancelled and pending appointments
            ->get();

        // Group and count appointments by day
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
            'status' => $status,
            'appointmentType' => $appointmentType,
            'selectedDate' => $selectedDate,
            'appointmentCounts' => $appointmentCounts,
            'appointments' => $appointments,
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
