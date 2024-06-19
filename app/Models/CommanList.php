<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommanList extends Model
{
    function getSubjectTypeDescription($subjectType)
    {
        $descriptions = [
            'App\Models\User' => 'User Module',
            'App\Models\Event' => 'Event Module',
            'App\Models\Appointment' => 'Appointment Module',
            // Add more mappings as needed
        ];

        return $descriptions[$subjectType] ?? $subjectType;
    }
}
