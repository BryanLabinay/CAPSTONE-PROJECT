<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportAppointmentData;
use App\Exports\ExportApprovedAppointment;
use App\Exports\ExportRejectedAppointment;
use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportAppointmentController extends Controller
{
    // All Appointment
    public function ExportAppointmentExcel()
    {
        return Excel::download(new ExportAppointmentData, 'Appointment-Record.xlsx');
    }

    // Export Approved Appointment
    public function ExportApprovedAppointmentExcel()
    {
        return Excel::download(new ExportApprovedAppointment, 'Approved-AppointmentRecord.xlsx');
    }

    public function ExportRejectedAppointmentExcel()
    {
        return Excel::download(new ExportRejectedAppointment, 'Rejected-AppointmentRecord.xlsx');
    }


    // Export PDF
    public function ExportAllAppointmentPdf()
    {
        $appointments = Appointment::all();
        $pdf = PDF::loadView('Admin.Export-PDF.export-pdf', compact('appointments'));
        return $pdf->download('Download-Record.pdf');
    }

    public function ExportApprovedAppointmentPdf()
    {
        $appointments = Appointment::where('status', 'Approved')->get();
        $pdf = PDF::loadView('Admin.Export-PDF.export-approved-pdf', compact('appointments'));
        return $pdf->download('Download-Record.pdf');
    }

    public function ExportCancelledAppointmentPdf()
    {
        $cancelled = Appointment::where('status', 'Cancelled')->get();
        $pdf = Pdf::loadView('Admin.Export-PDF.export-cancelled-pdf', compact('cancelled'));
        return $pdf->download('Download-Record.pdf');
    }


    // reports


    public function reports()
    {
        // Count statuses
        $statusCounts = [
            'Pending' => Appointment::where('status', 'Pending')->count(),
            'Approved' => Appointment::where('status', 'Approved')->count(),
            'Cancelled' => Appointment::where('status', 'Cancelled')->count(),
        ];

        // Count appointments by status and appointment column
        $appointmentStatusCounts = Appointment::select('appointment', 'status', Appointment::raw('count(*) as total'))
            ->groupBy('appointment', 'status')
            ->get()
            ->groupBy('appointment');

        // Load view and pass data
        $pdf = PDF::loadView('Admin.Export-PDF.reports-pdf', compact('statusCounts', 'appointmentStatusCounts'));

        // Return the PDF download
        return $pdf->stream('appointments_report.pdf');
    }
    // Pass data to the view




}
