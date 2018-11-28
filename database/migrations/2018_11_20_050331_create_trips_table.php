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
            $table->date('date_depart');
             $table->string('time_depart');
            $table->decimal('ticket_price',19,4);
            $table->foreign('bus_id')->references('bus_id')->on('buses');
            $table->foreign('route_id')->references('route_id')->on('routes');
            $table->integer('total_seat');
            $table->string('bus_layout');
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
        Schema::dropIfExists('trips');
    }
}
