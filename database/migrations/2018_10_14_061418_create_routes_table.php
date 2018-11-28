<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('route_id');
            //$table->integer('bus_id')->unsigned();
            // $table->integer('operator_id')->unsigned();
            // $table->foreign('operator_id')->references('user_id')->on('users');
            // $table->foreign('bus_id')->references('bus_id')->on('buses');
            $table->string('origin_terminal');
            $table->string('destination_terminal');
            $table->timestamps();
        });

        DB::update("ALTER TABLE routes AUTO_INCREMENT = 7000001;");        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
