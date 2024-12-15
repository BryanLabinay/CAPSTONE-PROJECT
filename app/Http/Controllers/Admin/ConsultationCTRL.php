<?php

namespace App\Http\Controllers\Admin;

use App\Models\DoctorList;
use App\Models\Consultation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultationCTRL extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = DoctorList::all();
        $consultation = Consultation::paginate(6);
        return view('Admin.add-activity.Consultation.index', compact('consultation', 'doctor'));
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
        // Validate the incoming request
        $request->validate([
            'consultation' => 'required|string',
            'day' => 'required|string',
            'doctor' => 'required|string',
            // 'price' => 'required|numeric',
        ]);

        // Create a new instance of the Consultation model
        $consultation = new Consultation();
        $consultation->consultation = $request->consultation;
        $consultation->day = $request->day;
        $consultation->doctor = $request->doctor;
        // $consultation->price = $request->price;

        // Save the model instance to the database
        $consultation->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Consultation uploaded');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $show = Consultation::findOrFail($id);
        $consultation = Consultation::paginate(6);
        return view('Admin.add-activity.Consultation.show', compact('show', 'consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = DoctorList::all();
        $edit = Consultation::findOrFail($id);
        $consultation = Consultation::paginate(6);
        return view('Admin.add-activity.Consultation.edit', compact('edit', 'consultation', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'consultation' => 'required|string',
            'day' => 'required|string',
            'doctor' => 'required|string',
            // 'price' => 'required|numeric',

        ]);

        $consultation = Consultation::findOrFail($id);
        $consultation->consultation = $request->consultation;
        $consultation->day = $request->day;
        $consultation->doctor = $request->doctor;
        // $consultation->price = $request->price;

        $consultation->save();

        return redirect()->back()->with('update', 'Consultation updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $show = Consultation::find($id)->delete();
        return redirect()->route('index.consultation')->with('delete');
    }
}
