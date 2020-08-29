<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vehicles', function (Blueprint $table) {
            $table->bigIncrements('user_vehicle_id');
            $table->unsignedBigInteger('user_id');
            $table->string('licence_no');
            $table->string('vehicle_image');
            $table->string('vehicle_color');
            $table->string('note');
            $table->boolean('v_status')->default(1);
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_vehicles');
    }
}
