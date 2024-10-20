<?php

namespace App\Http\Controllers\Admin;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    // All User Appointment List
    public function appointmentlist()
    {
        $appointments = Appointment::with('user')
            ->orderByRaw("CASE WHEN status = 'pending' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Admin.Appointment.all-appointment', compact('appointments'));
    }


    // Pending Appointment
    public function pending()
    {
        $pendings = Appointment::where('status', 'Pending')->paginate(10);
        return view('Admin.Appointment.pending-appointment', compact('pendings'));
    }
    // Approved Appointment
    public function approved()
    {
        $approved = Appointment::where('status', 'Approved')->paginate(10);
        return view('Admin.Appointment.approved-appointment', compact('approved'))->with('message', 'Appointment Approved');
    }
    // Cancelled Appointment
    public function cancelled()
    {
        $cancelled = Appointment::where('status', 'Cancelled')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('Admin.Appointment.cancelled-appointment', compact('cancelled'))->with('statusCancelled', 'Appointment Rejected');
    }
    // Delete
    public function destroy($appointment_id)
    {
        $appointment = Appointment::find($appointment_id)->delete();
        return redirect()->back()->with('delete', 'Appointment is Remove');
    }

    public function searchByName(Request $request)
    {
        $searchName = $request->input('name');
        $appointments = Appointment::where('name', 'like', '%' . $searchName . '%')->paginate(10);
        return view('Admin.Appointment.all-appointment', compact('appointments'));
    }

    public function filterByDate(Request $request)
    {
        $filterDate = $request->input('filter_date');
        $appointments = Appointment::whereDate('date', $filterDate)->paginate(10);

        return view('Admin.Appointment.all-appointment', compact('appointments'));
    }

    public function showTodayAppointments()
    {
        // Filter appointments for today's date
        $todayDate = now()->toDateString();
        $appointments = Appointment::whereDate('date', $todayDate)->paginate(10);

        return view('Admin.Appointment.all-appointment', compact('appointments'));
    }
}
