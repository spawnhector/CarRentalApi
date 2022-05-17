<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicleAvailability extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'isAvailable',
        'startDate',
        'endDate',
    ];
}
