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
            'patient_name' => $request->input('title')
        ];

        $pdf = Pdf::loadView('admin.medicalcertificate-pdf', $data);
        return $pdf->stream('medical_certificate.pdf');
    }

}
