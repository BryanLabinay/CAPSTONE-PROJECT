<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicalCertCTRL extends Controller
{
    public function medicalcertificate()
    {
        return view('Admin.medicalcertificate');
    }
}
