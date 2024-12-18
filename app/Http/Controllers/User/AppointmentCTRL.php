<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\AppointmentFormRequest;

class AppointmentCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())
            ->orderByRaw("CASE WHEN status = 'Pending' THEN 1 ELSE 2 END")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('User.appointment-list', compact('appointments'));
    }


    public function approvedStatus($id)
    {
        $approved = Appointment::findOrFail($id);
        $user = User::find($approved->user_id);

        // Update appointment status to 'Approved'
        $approved->status = 'Approved';
        $approved->save();

        // Notify the user
        Notification::send($user, new UserNotification('Your Appointment has been Approved'));



        return redirect()->back()->with('statusApproved', 'Approved status updated successfully');
    }

    public function canceledStatus(Request $request, $id)
    {
        $approved = Appointment::findOrFail($id);
        $user = User::find($approved->user_id);

        // Update appointment status to 'Cancelled' with a reason
        $approved->status = 'Cancelled';
        $approved->reason = $request->reason;
        $approved->updated_at = now();
        $approved->save();

        // Notify the user
        Notification::send($user, new UserNotification('Your Appointment has been Cancelled'));


        return redirect()->back()->with('statusCancelled', 'Cancelled status updated successfully');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',  // Made mname optional
            'lname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:255',  // Made suffix optional
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|min:10|max:15',  // Adjust based on your requirements
            'date' => 'required|date',
            'appointment' => 'required|string',
            'message' => 'nullable|string'
        ]);
        // dd($request);
        Appointment::create([
            'user_id' => Auth::user()->id,
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname') ?: null,  // Store null if empty
            'lname' => $request->input('lname'),
            'suffix' => $request->input('suffix') ?: null,  // Store null if empty
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'appointment' => $request->input('appointment'),
            'message' => $request->input('message') ?: null,  // Store null if empty
        ]);

        $admins = User::where('usertype', 'admin')->get(); // Adjust 'role' field as per your database structure
        Notification::send($admins, new UserNotification('You have an new appointment request.'));


        return redirect()->back()->with('status', 'Your Appointment has been added.');
    }



    public function edit($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        $consultation = Consultation::all();
        return view('User.edit-appointment', compact('appointment', 'consultation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentFormRequest $request, $appointment_id)
    {
        $data = $request->validated();

        $data = Appointment::where('id', $appointment_id)->update([
            'fname' => $data['fname'],
            'mname' => $data['mname'],
            'lname' => $data['lname'],
            'suffix' => $data['suffix'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'date' => $data['date'],
            'appointment' => $data['appointment'],
            'message' => $data['message'],
        ]);

        return redirect('/Appointment-List')->with('update', 'Apppointment Changed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($appointment_id)
    {
        $appointment = Appointment::find($appointment_id)->delete();
        return redirect('/Appointment-List')->with('delete', 'Appointment is Remove');
    }
}
