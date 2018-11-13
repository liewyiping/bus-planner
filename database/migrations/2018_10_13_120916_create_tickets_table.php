<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('trip_id');
            //$table->string('company_name');
            // $table->string('bus_id')->index();
            // $table->foreign('bus_id')->references('bus_id')->on('buses');           
            $table->string('date_depart');
            $table->string('time_depart');
            $table->string('ticket_price');
            $table->string('route_id')->references('route_id')->on('routes');

            $table->timestamps();
        });

        DB::update("ALTER TABLE tickets AUTO_INCREMENT = 6000000001;");        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
