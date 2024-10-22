<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;
use App\Models\Patient; // Assuming you have a Patient model

class MedicalCertCTRL extends Controller
{
    // Render the medical certificate form
    public function medicalcertificate()
    {
        return view('Admin.medicalcertificate');
    }

    public function fetchPatientNames(Request $request)
    {
        $query = $request->get('query'); // Get the query string from the request

        // Fetch patient records matching the query
        $patients = Appointment::where(function($q) use ($query) {
            $q->where('fname', 'LIKE', "%{$query}%")
              ->orWhere('mname', 'LIKE', "%{$query}%")
              ->orWhere('lname', 'LIKE', "%{$query}%");
        })->get(['fname', 'mname', 'lname', 'address']); // Include address in the selection

        // Create an array of patient details
        $patientDetails = $patients->map(function($patient) {
            return [
                'fullName' => trim("{$patient->fname} {$patient->mname} {$patient->lname}"),
                'address' => $patient->address,
            ];
        });

        return response()->json($patientDetails); // Return matching names and addresses as JSON

    }

    // Generate the PDF for medical certificate
    public function MedicalCertificatePDF(Request $request)
    {
        $formattedDate = Carbon::now()->isoFormat('MMMM D, YYYY');

        $data = [
            'date' => $formattedDate,
            'patient_name' => $request->input('title'),
            'address' => $request->input('address'),
            'heart' => $request->input('heart'),
            'lung' => $request->input('lung'),
            'heent' => $request->input('heent'),
            'abdomen' => $request->input('abdomen'),
            'extremeties' => $request->input('extremeties'),
            'intergumentary' => $request->input('intergumentary'),

            // Vital Signs
            'bp' => $request->input('bp'),
            'cr' => $request->input('cr'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'date' => now()->toDateString(),

            // Remarks/Diagnosis
            'remarks' => $request->input('remarks'),

            // Doctor Information
            'doctorName' => $request->input('doctorName'),
            'position' => $request->input('position'),
            'district' => $request->input('district'),
        ];

        $pdf = Pdf::loadView('admin.medicalcertificate-pdf', $data)
            ->setPaper('letter', 'portrait');

        return $pdf->stream('medical_certificate.pdf');
    }
}
