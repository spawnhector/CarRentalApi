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
        Schema::create('vehicle_addon_subs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('addon_id')->unsigned();
            $table->foreign('addon_id')->references('id')->on('vehicle_addons')->onDelete('cascade');
            $table->string('title');
            $table->longText('details');
            $table->integer('rate');
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
        Schema::dropIfExists('vehicle_addon_subs');
    }
};
