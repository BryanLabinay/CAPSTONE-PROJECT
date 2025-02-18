<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'events';

    protected $fillable = [
        'title',
        'admin_id',
        'date',
        'time',
        'location',
        'description',
        'activity',
        'attend',
        'img'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title']);
        // Chain fluent methods for configuration options
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
