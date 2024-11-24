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
use Carbon\Carbon;

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



    public function ExportAllAppointmentPdf(Request $request)
    {
        // Validate the incoming dates
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the selected start and end dates
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->startOfDay();
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->endOfDay();

        // Retrieve all appointments within the selected date range
        $appointments = Appointment::whereBetween('date', [$start_date, $end_date])->get();

        // Generate the PDF with the filtered appointments
        $pdf = PDF::loadView('Admin.Export-PDF.export-pdf', compact('appointments'));

        // Return the generated PDF as a download
        return $pdf->stream('All-Record-' . $start_date->format('Y-m-d') . '-to-' . $end_date->format('Y-m-d') . '.pdf');
    }


    public function ExportApprovedAppointmentPdf(Request $request)
    {
        // Validate the dates
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Retrieve the selected start and end dates
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->startOfDay();
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->endOfDay();

        // Get appointments filtered by status and date range
        $appointments = Appointment::where('status', 'Approved')
                                    ->whereBetween('date', [$start_date, $end_date])
                                    ->get();

        // Generate PDF with the filtered appointments
        $pdf = PDF::loadView('Admin.Export-PDF.export-approved-pdf', compact('appointments'));

        // Return the PDF file as a download stream
        return $pdf->stream('Download-Approved-Record.pdf');
    }

    public function ExportCancelledAppointmentPdf(Request $request)
    {
        // Validate the incoming dates
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Get the selected start and end dates
        $start_date = Carbon::createFromFormat('Y-m-d', $request->start_date)->startOfDay();
        $end_date = Carbon::createFromFormat('Y-m-d', $request->end_date)->endOfDay();

        // Retrieve cancelled appointments within the selected date range
        $cancelled = Appointment::where('status', 'Cancelled')
                                ->whereBetween('date', [$start_date, $end_date])
                                ->get();

        // Generate the PDF with the cancelled appointments
        $pdf = PDF::loadView('Admin.Export-PDF.export-cancelled-pdf', compact('cancelled'));

        // Return the generated PDF as a download
        return $pdf->stream('Cancelled-Record-' . $start_date->format('Y-m-d') . '-to-' . $end_date->format('Y-m-d') . '.pdf');
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

    public function patientsRecordPdf(Request $request)
    {
        // Validate date inputs
        $request->validate([
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Filter records by date range
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $patients = Appointment::whereDate('date', '>=', $start_date)
            ->whereDate('date', '<=', $end_date)
            ->orderBy('fname', 'asc')
            ->get();

        // Generate PDF
        $pdf = PDF::loadView('Admin.Patients-Record.export-patients-record', compact('patients'));
        return $pdf->stream('Download-Record.pdf');
    }

}
