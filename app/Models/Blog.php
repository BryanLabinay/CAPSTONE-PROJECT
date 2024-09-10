<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Blog extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'blog';

    protected $fillable = [
        'title',
        'description',
        'img'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['title']);
    }
}
