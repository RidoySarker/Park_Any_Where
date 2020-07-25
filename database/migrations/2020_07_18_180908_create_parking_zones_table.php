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
            $table->string('latitude');
            $table->string('longitude');
            $table->Integer('parking_type')->comment('1 = Package, 2 = Vehicle');
            $table->unsignedBigInteger('package_name')->nullable();
            $table->foreign('package_name')->references('package_id')->on('packages')->onDelete('cascade');
            $table->unsignedBigInteger('vehicle_type')->nullable();
            $table->foreign('vehicle_type')->references('vehicle_id')->on('vehicles')->onDelete('cascade');
            $table->Integer('parking_charge');
            $table->Integer('parking_time');
            $table->string('parking_period');
            $table->Integer('parking_limit');
            $table->text('parking_address');
            $table->text('parking_note')->nullable();
            $table->boolean('parking_status')->default(1);
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
