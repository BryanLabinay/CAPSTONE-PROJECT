<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientsRecordCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Define the number of items per page
        $perPage = 10;

        // Fetch unique patient details and counts
        $patients = Appointment::select(
            DB::raw('BINARY name as name'),
            'phone',
            'address',
            DB::raw('count(*) as total')
        )
            ->groupBy(DB::raw('BINARY name'), 'phone', 'address')
            ->paginate($perPage);

        // Fetch all appointments for patients in one query
        $allAppointments = Appointment::all();

        return view('Admin.Patients-Record.patients-record', compact('patients', 'allAppointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(string $id) {}

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
