<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentDetail extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('payment_details', function($table) {
            $table->increments('id');
            $table->integer('reservation_id')->unsigned()->nullable();
            $table->integer('days');
            $table->string('hours');
            $table->float('price_per_day');
            $table->string('price_per_day_details');
            $table->float('price_per_hour');
            $table->string('price_per_hour_details');
            $table->float('rental_fee');
            $table->float('insurance_val');
            $table->float('sub_total');
            $table->float('tax_val');
            $table->float('total_price');
            $table->float('deposit_payment');
            $table->timestamps();
        });
        Schema::table('payment_details', function($table) {
            $table->foreign('reservation_id')->references('id')->on('reservation')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('payment_details');
    }

}
