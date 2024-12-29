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
            ->get();

        return view('Admin.Appointment.all-appointment', compact('appointments'));
    }


    // Pending Appointment
    public function pending()
    {
        $pendings = Appointment::where('status', 'Pending')->get();
        return view('Admin.Appointment.pending-appointment', compact('pendings'));
    }
    // Approved Appointment
    public function approved()
    {
        $approved = Appointment::where('status', 'Approved')->get();
        return view('Admin.Appointment.approved-appointment', compact('approved'))->with('message', 'Appointment Approved');
    }
    // Follow Up Appointment
    public function followup()
    {
        $followups = Appointment::where('status', 'Rescheduled')->get();
        return view('Admin.Appointment.follow-up', compact('followups'))->with('statusFollowUp', 'Appointment Follow Up');
    }

    // Cancelled Appointment
    public function cancelled()
    {
        $cancelled = Appointment::where('status', 'Cancelled')
            ->orderBy('created_at', 'desc')
            ->get();
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

        if (empty($searchName)) {
            // Fetch all patients if no search term is provided
            $appointments = Appointment::paginate(10);
        } else {
            // Perform the search
            $appointments = Appointment::where('fname', 'like', '%' . $searchName . '%')
                ->orWhere('mname', 'like', '%' . $searchName . '%')
                ->orWhere('lname', 'like', '%' . $searchName . '%')
                ->paginate(10);
        }

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
