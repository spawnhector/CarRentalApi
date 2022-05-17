<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'model',
        'year',
        'price',
        'seat',
        'detail',
        'subDetail',
    ];

    public function isAvailable(){
        return $this->hasOne(vehicleAvailability::class,'vehicle_id');
    }

    public function addons(){
        return $this->hasMany(vehicleAddon::class,'vehicle_id')->with('subAddons');
    }
    
    public function files(){
        return $this->hasMany(File::class,'vehicle_id');
    }

}
