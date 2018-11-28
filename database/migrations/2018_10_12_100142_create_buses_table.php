<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            
            $table->increments('bus_id');
            $table->string('total_seat');
            $table->string('registration_plate')->unique();            
            $table->integer('operator_id')->unsigned();
            $table->foreign('operator_id')->references('user_id')->on('users');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::update("ALTER TABLE buses AUTO_INCREMENT = 40001;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
