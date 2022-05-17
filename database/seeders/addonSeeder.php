<?php

namespace Database\Seeders;

use App\Models\vehicleAddon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vehicleAddon::create([
            'vehicle_id'=>1,
            'title'=>'Free VIP pickup: Sangster (MBJ) Airport, Montego Freeport, select resorts, etc',
            'details'=>'→ SANGSTER INTERNATIONAL (MBJ) AIRPORT
            Enter your flight and mobile numbers below. Your vehicle will be waiting at Arrivals 30 minutes after touchdown. Free 24/7 VIP pickup is available outside office hours at no extra charge. Just update us on your situation (954.300.4436) and a car will be one less thing to worry about if your flight or customs clearance is delayed.
            → MONTEGO FREEPORT (CRUISE SHIP) TERMINAL
            Enter the name of your vessel and a mobile phone number below. Your vehicle will be waiting at the appointed time.*Private vessels may select Montego Bay Yacht Club under "hotels & villas" below.
            → SELECT HOTELS AND VILLAS
            We service ALL Jamaica Tourist Board-approved resorts (hotels, villas, guest houses, etc.) in the Montego Bay area. If you doubt that we can reach you, call (954.300.4436)
            
            For the best possible VIP pickup experience, please keep your phone-ringer on at the appointed time and keep us in the loop if you are experiencing any delays.
            Go ahead and text, WhatsApp or call us (876.430.7334 or 954.300.4436) anytime. We love to hear from you.'
        ]);
    }
}
