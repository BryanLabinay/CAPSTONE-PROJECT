<?php

namespace App\Http\Controllers\Navigation;

use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminNavCTRL extends Controller
{
    // Admin Calendar


    // Admin Dashboard
    public function admindashboard()
    {
        return view('Admin.dashboard');
    }

    // Admin Profile
    public function appointmentlist()
    {
        $consultation = Consultation::all();
        return view('Admin.appointment-list', compact('consultation'));
    }
    // Add Activity
    // -Add Event
    public function addevent()
    {
        return view('Admin.add-activity.add-event');
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
