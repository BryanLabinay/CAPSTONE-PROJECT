<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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




        ];


        $pdf = Pdf::loadView('admin.medicalcertificate-pdf', $data);
        return $pdf->stream('medical_certificate.pdf');
    }

}
