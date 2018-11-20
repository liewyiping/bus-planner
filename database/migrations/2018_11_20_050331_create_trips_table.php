<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('trip_id');
            $table->integer('bus_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->string('date_depart');
            $table->string('time_depart');
            // $table->decimal('ticket_price',19,4);
            $table->foreign('bus_id')->references('bus_id')->on('buses');
            $table->foreign('route_id')->references('route_id')->on('routes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
