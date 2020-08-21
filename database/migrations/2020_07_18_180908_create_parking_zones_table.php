<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_zones', function (Blueprint $table) {
            $table->bigIncrements('parking_zone_id');
            $table->string('parking_name');
            $table->unsignedBigInteger('location_zone_name');
            $table->foreign('location_zone_name')->references('location_zone_id')->on('location_zones')->onDelete('cascade');
            $table->string('latitude');
            $table->string('longitude');
            $table->Integer('parking_limit');
            $table->text('parking_address');
            $table->text('parking_note')->nullable();
            $table->boolean('parking_status')->default(0);
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
        Schema::dropIfExists('parking_zones');
    }
}
