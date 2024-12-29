<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    use HasFactory, LogsActivity, Notifiable;

    protected $table = 'appointments';
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'suffix',
        'email',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
