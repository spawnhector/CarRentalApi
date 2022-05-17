<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\booking;
use App\Mail\vehicleReserveMail;

class BookingController extends Controller
{
    public function reserve_vehicle(Request $request){
        
        $data = json_decode($request->input('data'));
        // dd($data);
        $booking_id = 'EPIC-'.rand(1,9).rand(1,9).rand(1,9).rand(1,9).rand(1,9);
        $booking = booking::create([
            'booking_id' => $booking_id,
            'vehicle_id'=> $data->selectedVehicleData->id,
            'booking_user'=> $data->reserveForm->name,
            'booking_user_email'=> $data->reserveForm->email,
            'booking_user_country'=> $data->reserveForm->country,
            'booking_user_license'=> $data->reserveForm->license,
            'booking_user_phone'=> $data->reserveForm->phone,
            'booking_user_differentDropOff'=> $data->reserveForm->dropoff,
            'booking_user_differentInvoice'=> $data->reserveForm->invoice,
            'booking_note'=> $data->reserveForm->note,
            'booking_stay_in_touch'=> $data->reserveForm->booking_stay_in_touch,
            'booking_total'=> $data->booking_total,
            'booking_subTotal'=> $data->booking_subTotal,
            'booking_after_tax'=> $data->booking_after_tax,
            'terms_agreed'=> $data->data->signature_consent,
            'terms_fullname'=> $data->data->fullname,
            'terms_userSignature'=> json_encode($data->data->trimmedDataURL),
            'booking_start_date'=> $data->bookingReserveStartDate,
            'booking_end_date'=> $data->bookingReserveEndDate,
            'booking_days'=> $data->booking_days,
            'addons'=> json_encode($data->selectedAddon),
        ]);
        Mail::to($data->reserveForm->email)->send(new vehicleReserveMail($data,$booking_id,$booking));
        return response()->json([
            'success' => $data
        ],200);
    }
}
