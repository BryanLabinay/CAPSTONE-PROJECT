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
        $appointments = Appointment::orderBy('created_at', 'desc')->paginate(5);
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
}
