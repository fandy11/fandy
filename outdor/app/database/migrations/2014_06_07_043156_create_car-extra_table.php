<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarExtraTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('extra', function($table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('price');
            $table->enum('type', array('day', 'reservation'))->default('day');
            $table->boolean('status')->default(0);
            // Add needed columns here (f.ex: name, slug, path, etc.)
            // $table->string('name', 255);

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
        Schema::drop('extra');
       
    }

}
