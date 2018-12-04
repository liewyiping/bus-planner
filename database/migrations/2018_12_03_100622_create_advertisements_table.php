<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('advertisement_id');
            $table->integer('company_name')->unsigned();
            $table->datetime('datetime_start');
            $table->datetime('datetime_end');  
            $table->integer('duration');
            $table->string('banner_image_ads');
            $table->string('banner_image_ads_link');
            $table->string('status');

            $table->foreign('company_name')->references('bus_company_id')->on('companies');
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
        Schema::dropIfExists('advertisements');
    }
}
