<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeExtraTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('type_extra', function($table) {
            $table->increments('id');
            $table->integer('type_id')->unsigned();
            $table->integer('extra_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('type_extra', function($table) {
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('extra_id')->references('id')->on('extra')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('type_extra');
    }

}
