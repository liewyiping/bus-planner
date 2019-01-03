<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('driver_id');
            $table->string('driver_name');
            $table->integer('bus_company_id')->unsigned();
            $table->integer('driver_ic');
            $table->string('driver_email');
            $table->string('driver_address');
            $table->foreign('bus_company_id')->references('bus_company_id')->on('companies');



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
        Schema::dropIfExists('drivers');
    }
}