<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class vehicleReserveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $booking_id;
    public $booking;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$booking_id,$booking)
    {
        $this->data = $data;
        $this->booking_id = $booking_id;
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Booking For '.$this->booking_id)->view('emails.vehicleReserveMail');
    }
}
