<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ClinicMail;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Notifications\UserNotification;
use Illuminate\Support\Facades\Notification;


class SetAppointmentCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Appointment::whereIn('status', ['Approved', 'Rescheduled', 'Closed'])->orderBy('fname', 'asc')->get();

        return view('Admin.Set-Appointment.index-set', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'message' => 'nullable|string',
        ]);

        // Find the existing appointment
        $existingPatient = Appointment::findOrFail($id);

        // Fetch the associated user using the relationship defined in the Appointment model
        $user = $existingPatient->user;  // Use the hasMany relationship

        // Update the existing appointment status to 'Rescheduled'
        $existingPatient->status = 'Rescheduled';
        $existingPatient->save();

        // Create a new appointment based on the existing one
        $newAppointment = $existingPatient->replicate();
        $newAppointment->date = $validated['date'];
        $newAppointment->status = 'Approved';
        $newAppointment->save();

        // Prepare the message content for email and notification
        $messageContent = "Your appointment has been updated. The new date is: " . \Carbon\Carbon::parse($validated['date'])->format('F j, Y') . ".\n\n" . $validated['message'];

        // Send a notification to the associated user
        Notification::send($user, new UserNotification('Follow-up Appointment.'));

        // Send an email to the patient
        Mail::to($existingPatient->email)->send(new ClinicMail($messageContent));

        // Redirect with success message
        return redirect()->route('index')->with('success', 'New appointment record created successfully with the updated date.');
    }






    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
