<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->increments('operator_id');
            $table->integer('user_id_operators')->unsigned();
            $table->integer('applicationform_id_operators')->unsigned();
            $table->integer('bus_company_id')->unsigned(); 
            // $table->string('license_number', 10);     
            $table->foreign('bus_company_id')->references('bus_company_id')->on('companies');  
            $table->foreign('user_id_operators')->references('user_id')->on('users'); 
            $table->foreign('applicationform_id_operators')->references('id')->on('application_forms');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::update("ALTER TABLE operators AUTO_INCREMENT = 20001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operators');
    }
}
