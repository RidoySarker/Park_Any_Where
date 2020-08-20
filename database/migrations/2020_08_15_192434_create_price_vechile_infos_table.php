<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceVechileInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vechile_price_info', function (Blueprint $table) {
            $table->bigIncrements('price_vechile_info_id');
            $table->unsignedBigInteger('parking_name');
            $table->foreign('parking_name')->references('parking_zone_id')->on('parking_zones')->onDelete('cascade');
            $table->unsignedBigInteger('parking_price_id');
            $table->foreign('parking_price_id')->references('parking_price_id')->on('parking_prices')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_type');
            $table->foreign('vehicle_type')->references('vehicle_id')->on('vehicles')->onDelete('cascade');
            $table->Integer('vehicle_charge');
            $table->Integer('vehicle_time');
            $table->string('vehicle_period');
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
        Schema::dropIfExists('price_vechile_infos');
    }
}
