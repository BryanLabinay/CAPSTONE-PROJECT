<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportRejectedAppointment implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Appointment::select('name', 'address', 'phone', 'appointment', 'status', 'created_at')
            ->where('status', 'Cancelled')  // Only get approved appointments
            ->get();
    }
    public function headings(): array
    {
        return [
            'Name',
            'Address',
            'Phone',
            'Appointment',
            'Status',
            'Date',
        ];
    }
    public function map($user): array
    {
        return [
            $user->name,
            $user->address,
            $user->phone,
            $user->appointment,
            $user->status,
            $user->created_at->format('F j, Y, g:i a'), // Humanized date
            // $user->updated_at->format('F j, Y, g:i a'), // Humanized date
        ];
    }
}
