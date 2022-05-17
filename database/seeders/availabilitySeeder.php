<?php

namespace Database\Seeders;

use App\Models\vehicleAvailability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class availabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vehicleAvailability::create([
            'vehicle_id'=>1,
            'isAvailable'=>1,
            'startDate'=>'Mon Apr 07 2022 00:00:00 GMT-0500',
            'endDate'=>'Mon Apr 12 2022 00:00:00 GMT-0500',
        ]);
    }
}
