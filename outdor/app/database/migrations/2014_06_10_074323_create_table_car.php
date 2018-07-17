<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCar extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('car', function($table) {
            $table->increments('id');
            $table->string('make');
            $table->string('model');
            $table->string('registration_num');
            $table->bigInteger('mileage');
            $table->integer('location_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::table('car', function($table) {
            $table->foreign('location_id')->references('id')->on('location')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('car');
    }

}
