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
            $table->string('name',250);
            $table->string('email')->unique();
            $table->string('license_number', 10);  
            //$table->string('company_name',250);      
            $table->timestamp('email_verified_at')->nullable();
            $table->string('bus_company_id')->references('bus_company_id')->on('companies'); 
            $table->string('password');
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
