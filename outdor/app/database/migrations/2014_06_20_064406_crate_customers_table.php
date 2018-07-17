<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateCustomersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create('customers', function($table) {
            $table->increments('id');
            $table->enum('title', array('Dr', 'Mr', 'Mrs', 'Ms', 'Other', 'Prof', 'Rev'))->default('Dr');
            $table->string('name');
            $table->string('email', 100);
            $table->string('telephone', 15);
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->text('address');
            $table->string('zip', 10)->nullable();
            $table->timestamps();
        });

        Schema::table('reservation', function($table) {
            $table->foreign('user_id')->references('id')->on('customers')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('customers');
    }

}
