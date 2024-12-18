<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ClinicMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.email');
    }

    /**
     * Show the form for creating a new resource.
     */

    public function send_email(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'send' => 'required|string|max:5000', // Adjusted max length
        ]);

        $email = $request->email;
        $messageContent = $request->send;
        $patientId = $request->patient_id; // Capture the patient ID if needed

        try {
            Mail::to($email)->send(new ClinicMail($messageContent));
            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email: ' . $e->getMessage());
        }
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
