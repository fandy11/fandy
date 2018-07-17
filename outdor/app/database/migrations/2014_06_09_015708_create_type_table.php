<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('type', function($table) {
            $table->increments('id');
            $table->string('type', 200);
            $table->text('description');
            $table->string('image');
            $table->string('price_day');
            $table->string('price_hour');
            $table->integer('passengers');
            $table->integer('bags');
            $table->integer('doors');
            $table->enum('transmission', array('auto', 'manual'))->default('auto');
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
        Schema::drop('type');
    }

}
