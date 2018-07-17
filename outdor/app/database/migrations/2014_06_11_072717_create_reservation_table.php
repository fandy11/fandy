<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('reservation', function($table) {
            $table->increments('id');
            $table->enum('status', array('cancelled', 'collected', 'complete', 'confirmed', 'pending'))->default('pending');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('type_id')->unsigned();
            $table->integer('car_id')->unsigned();
            $table->char('extras');
            $table->integer('loc_pick')->unsigned();
            $table->integer('loc_return')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('reservation');
    }

}
