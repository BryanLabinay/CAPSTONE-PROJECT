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
