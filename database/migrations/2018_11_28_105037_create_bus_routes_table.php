<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_routes', function (Blueprint $table) {
            $table->increments('bus_route_id');
            $table->integer('route_id')->unsigned();
            $table->foreign('route_id')->references('route_id')->on('routes');
            $table->integer('bus_id')->unsigned();
            $table->foreign('bus_id')->references('bus_id')->on('buses');
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
        Schema::dropIfExists('bus_routes');
    }
}
