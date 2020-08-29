<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('booking_id');
            $table->unsignedBigInteger('invoice_base_info_id');
            $table->foreign('invoice_base_info_id')->references('invoice_base_info_id')->on('invoice_base_info');
            $table->unsignedBigInteger('parking_name');
            $table->foreign('parking_name')->references('parking_zone_id')->on('parking_zones');
            $table->unsignedBigInteger('parking_space');
            $table->foreign('parking_space')->references('parking_space_id')->on('parking_space');
            $table->integer('customer_id');
            $table->string('invoice_total')->nullable();
            $table->string('invoice_vat')->nullable();
            $table->string('invoice_discount')->nullable();
            $table->string('invoice_sub_total')->nullable();
            $table->string('vehicle_licence');
            $table->string('vehicle_time');
            $table->string('vehicle_type');
            $table->string('arrival_time');
            $table->string('release_time');
            $table->integer('booking_status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
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
}
