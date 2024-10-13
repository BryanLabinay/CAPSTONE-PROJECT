<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin_id',
        'position',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
