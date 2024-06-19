<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'appointments';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'date',
        'appointment',
        'message',
        'status',
        'reason',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'address', 'phone', 'date', 'appointment', 'status', 'message']);
        // Chain fluent methods for configuration options
    }
}
