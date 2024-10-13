<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppointmentFormRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('User.appointment-list', compact('appointments'));
    }

    public function approvedStatus($id)
    {
        // Logic to update the status of the order with the given ID
        $approved = Appointment::find($id);
        $approved->status = 'Approved';
        $approved->save();
        // Assuming $data->status holds the status of the appointment


        return redirect()->back()->with('statusApproved', 'Approved status updated successfully');
    }

    public function canceledStatus(Request $request, $id)
    {
        // Logic to update the status of the order with the given ID

        // Find the appointment record by ID
        $approved = Appointment::findOrFail($id);

        $approved->status = 'Cancelled';


        // $request->validate([
        //     'reason' => 'required|string',
        // ]);
        // Insert the selected reason into the 'message' column
        // $approved->user_id = $request->user_id;
        $approved->reason = $request->reason;
        $approved->updated_at = now();
        $approved->save();

        return redirect()->back()->with('statusCancelled', 'Cancelled status updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string',
            'date' => 'required|date',
            'appointment' => 'required|string',
            'message' => 'nullable|string'
        ]);

        Appointment::create([
            'user_id' => Auth::user()->id, // Adding the authenticated user's ID
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'date' => $request->input('date'),
            'appointment' => $request->input('appointment'),
            'message' => $request->input('message'),
        ]);
        return redirect()->back()->with('status', 'Your Appointment has been added.');
        // $data = $request->validated();

        // $appointment = Auth::user()->appointments()->create($data);
        // return redirect('/Appointment')->with('status', 'Your Appointment has been added.');
    }


    public function edit($appointment_id)
    {
        $appointment = Appointment::find($appointment_id);
        return view('User.edit-appointment', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AppointmentFormRequest $request, $appointment_id)
    {
        $data = $request->validated();

        $data = Appointment::where('id', $appointment_id)->update([
            'name' => $data['name'],
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
