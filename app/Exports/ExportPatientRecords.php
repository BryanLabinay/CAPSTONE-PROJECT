<?php

namespace App\Exports;

use App\Models\Appointment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportPatientRecords implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
        {
            return Appointment::select('fname', 'mname', 'lname', 'suffix', 'address', 'phone', 'appointment', 'status', 'created_at')
                ->whereIn('status', ['Approved', 'Rescheduled', 'Closed'])  // Only get approved appointments
                ->get();
        }
        public function headings(): array
        {
            return [
                'First Name',
                'Middle Name',
                'Last Name',
                'Suffix',
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
                $user->fname,
                $user->mname,
                $user->lname,
                $user->suffix,
                $user->address,
                $user->phone,
                $user->appointment,
                $user->status,
                $user->created_at->format('F j, Y, g:i a'), // Humanized date
                // $user->updated_at->format('F j, Y, g:i a'), // Humanized date
            ];
        }
    }

