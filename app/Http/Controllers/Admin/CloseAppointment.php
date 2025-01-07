<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class CloseAppointment extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderedClose = Appointment::whereIn('status', ['Approved', 'Rescheduled'])
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy(function ($appointment) {
                return \Carbon\Carbon::parse($appointment->date)->format('F j, Y');
            });



        return view('Admin.Close-Appointment.index', compact('orderedClose'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function closeAppointment($id)
    {
        // Find the appointment by its ID
        $appointment = Appointment::findOrFail($id);

        // Update the status to 'Closed'
        $appointment->status = 'Closed';
        $appointment->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Appointment status updated to Closed.');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
