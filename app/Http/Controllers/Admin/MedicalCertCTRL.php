<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

class MedicalCertCTRL extends Controller
{
    public function medicalcertificate()
    {
        return view('Admin.medicalcertificate');
    }

    public function MedicalCertificatePDF(Request $request)
    {

        $data = [
            'patient_name' => $request->input('title'),
            'address' => $request->input('address'),
            'heart' => $request->input('heart'),
            'lung' => $request->input('lung'),
            'heent' => $request->input('heent'),
            'abdomen' => $request->input('abdomen'),
            'extremeties' => $request->input('extremeties'),
            'intergumentary' => $request->input('intergumentary'),

            // vital Signs
            'bp' => $request->input('bp'),
            'cr' => $request->input('cr'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'date' => now()->toDateString(),

            //Remarks/Diagnosis
            'remarks' => $request->input('remarks'),
        ];



        $pdf = Pdf::loadView('admin.medicalcertificate-pdf',  $data)
            ->setPaper('letter', 'portrait');
        return $pdf->stream('medical_certificate.pdf');
    }
}
