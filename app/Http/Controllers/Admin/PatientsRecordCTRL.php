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
        // Fetch only approved patients ordered by 'fname'
        $patients = Appointment::whereIn('status', ['Approved', 'Rescheduled'])->orderBy('fname', 'asc')->get();

        return view('Admin.Patients-Record.patients-record', compact('patients'));
    }



    // Search Function
    public function patientsFilter(Request $request)
    {
        $filterDate = $request->input('filter_date');
        $patients = Appointment::whereDate('date', $filterDate)->paginate(10);

        return view('Admin.Patients-Record.patients-record', compact('patients'));
    }

    public function searchByName(Request $request)
    {
        $searchName = $request->input('name');

        if (empty($searchName)) {
            // Fetch all patients if no search term is provided
            $patients = Appointment::paginate(10);
        } else {
            // Perform the search
            $patients = Appointment::where('fname', 'like', '%' . $searchName . '%')
                ->orWhere('mname', 'like', '%' . $searchName . '%')
                ->orWhere('lname', 'like', '%' . $searchName . '%')
                ->paginate(10);
        }

        return view('Admin.Patients-Record.patients-record', compact('patients'));
    }



    public function showTodaypatients()
    {
        // Filter appointments for today's date
        $todayDate = now()->toDateString();
        $patients = Appointment::whereDate('date', $todayDate)->get();

        return view('Admin.Patients-Record.patients-record', compact('patients'));
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
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Appointment::findOrFail($id);
        $allAppointments = Appointment::all();

        return view('Admin.Patients-Record.patient-show', compact('patient', 'allAppointments'));
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
