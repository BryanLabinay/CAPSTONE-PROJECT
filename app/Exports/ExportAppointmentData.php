<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportAppointmentData implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Appointment::select('name', 'address', 'phone', 'appointment', 'created_at')->get();
    }
    public function headings(): array
    {
        return [
            'Name',
            'Address',
            'Phone',
            'Appointment',
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
            $user->created_at->format('F j, Y, g:i a'), // Humanized date
            // $user->updated_at->format('F j, Y, g:i a'), // Humanized date
        ];
    }
}
