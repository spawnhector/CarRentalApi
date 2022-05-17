<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'vehicle_id',
        'booking_user',
        'booking_user_email',
        'booking_user_country',
        'booking_user_license',
        'booking_user_phone',
        'booking_user_differentDropOff',
        'booking_user_differentInvoice',
        'booking_note',
        'booking_total',
        'booking_subTotal',
        'booking_after_tax',
        'booking_stay_in_touch',
        'terms_agreed',
        'terms_fullname',
        'terms_userSignature',
        'booking_start_date',
        'booking_end_date',
        'booking_days',
        'addons',
    ];
}
