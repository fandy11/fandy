<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarTypeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('car_type', function($table) {
            $table->increments('id');
            $table->integer('car_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('car_type', function($table) {
            $table->foreign('car_id')->references('id')->on('car')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('car_type');
    }

}
