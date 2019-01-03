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

            $table->increments('ticket_id');
            $table->integer('trip_id')->unsigned();
            $table->integer('user_id');
            $table->string('company_name');
            $table->string('origin_terminal');
            $table->string('destination_terminal');           
            $table->string('date_depart');
            $table->string('time_depart');
            $table->string('seatSelect');
            $table->string('pax_num');
            $table->decimal('ticket_price',19,4);
            //$table->string('route_id');
            //$table->foreign('route_id')->references('route_id')->on('routes');
            $table->string('route_id')->references('route_id')->on('routes');
            $table->foreign('trip_id')->references('trip_id')->on('trips');


            $table->timestamps();
        });     
        DB::update("ALTER TABLE routes AUTO_INCREMENT = 200001;");  
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

