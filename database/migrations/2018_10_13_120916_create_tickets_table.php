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
            $table->integer('trip_id');
            $table->string('company_name');
            $table->string('from');
            $table->string('to');           
            $table->string('date_depart');
            $table->string('time_depart');
            $table->string('number_of_ticket');
            $table->string('ticket_price');
            //$table->string('route_id');
            //$table->foreign('route_id')->references('route_id')->on('routes');
            $table->string('route_id')->references('route_id')->on('routes');

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
        Schema::dropIfExists('tickets');
    }
}
