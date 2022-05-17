<?php

namespace Database\Seeders;

use App\Models\vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class vehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vehicle::create([
            'name'=> 'Economy Car (Tiida or similar)',
            'files'=> 'vehicles/Lcat-2.jpg',
            'category'=> 'Car',
            'model'=> 'NISSAN',
            'year'=> '2016',
            'price'=> 30,
            'seat'=> '4',
            'detail'=> "Minivan (Noah, Voxy or similar) MORE SEATS. MORE SPACE. MORE OPTIONS. → USB Adapter → Reverse Camera → Push Start → Tools control → Steering control → Thermal control → Heated Seat → 7 or 8 Passengers → 4 Large Bags → Dual Air Conditioner → AM/FM Radio & CD player → Power Steering & Windows → Automatic Transmission → GPS Navigation (add-on) → Infant & Child Seats (add-on) Terms and Conditions Vehicles are rented to persons 25 - 70 years old who have held a valid Driver's License for at least 2 years. This limitation also applies to additional drivers. Credit cards must match the driver's license of the main driver. The driver is required to sign a Loss Damage Waiver form before collecting the vehicle.",
            'subDetail'=> "Choose and Economy Car (Tiida or similar), starting at $30/day or $180/week",
        ]);
    }
}
