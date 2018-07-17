<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('location', function($table) {
            $table->increments('id');
            $table->string('name',200);
            $table->string('email',100);
            $table->string('phone',15);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->text('address');
            $table->string('zip',10);
            $table->string('lat');
            $table->string('lng');
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
        Schema::drop('location');
    }

}
