<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('bus_company_id')->unique();
            $table->string('bus_company_name');
            $table->string('bus_company_phone_no');
            $table->string('bus_company_address');
            $table->string('bus_company_registration_no');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::update("ALTER TABLE companies AUTO_INCREMENT = 5001;");        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
