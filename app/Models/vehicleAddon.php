<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicleAddon extends Model
{
    use HasFactory;
    protected $fillable = [
        'vehicle_id',
        'title',
        'details'
    ];
    
    public function subAddons(){
        return $this->hasMany(vehicleAddonSub::class,'addon_id');
    }
}
