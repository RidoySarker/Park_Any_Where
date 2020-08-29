<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePaymentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payment_info', function (Blueprint $table) {
            $table->bigIncrements('invoice_payment_info_id');
            $table->unsignedBigInteger('invoice_base_info_id');
            $table->foreign('invoice_base_info_id')->references('invoice_base_info_id')->on('invoice_base_info');
            $table->unsignedBigInteger('booking_id');
            $table->foreign('booking_id')->references('booking_id')->on('bookings');
            $table->integer('customer_id')->nullable();
            $table->string('invoice_total')->nullable();
            $table->string('invoice_vat')->nullable();
            $table->string('invoice_discount')->nullable();
            $table->string('invoice_sub_total')->nullable();
            $table->string('pay_amount')->nullable();
            $table->string('due_amount')->nullable();
            $table->unsignedBigInteger('invoice_payment_method');
            $table->foreign('invoice_payment_method')->references('payment_method_id')->on('payment_methods');
            $table->string('invoice_transaction_number')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->string("store");
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
        Schema::dropIfExists('invoice_payment_infos');
    }
}
