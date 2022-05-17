<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
            $table->string('booking_user');
            $table->string('booking_user_email');
            $table->string('booking_user_country');
            $table->string('booking_user_license');
            $table->string('booking_user_phone');
            $table->integer('booking_user_differentDropOff');
            $table->integer('booking_user_differentInvoice');
            $table->string('booking_note');
            $table->string('booking_total');
            $table->string('booking_subTotal');
            $table->string('booking_after_tax');
            $table->integer('booking_stay_in_touch');
            $table->integer('terms_agreed');
            $table->string('terms_fullname');
            $table->longText('terms_userSignature');
            $table->string('booking_start_date');
            $table->string('booking_end_date');
            $table->string('booking_days');
            $table->longText('addons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
