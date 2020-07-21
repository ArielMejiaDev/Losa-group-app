<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('parking')->nullable();
            $table->string('rooms')->nullable();
            $table->string('beds')->nullable();
            $table->string('maintenance_person')->nullable();
            $table->string('maintenance_phone')->nullable();
            $table->string('maps_link')->nullable();
            $table->string('wifi_network')->nullable();
            $table->string('wifi_password')->nullable();
            $table->string('image')->nullable()->nullable();
            $table->string('info_phone')->nullable();
            $table->string('reception_phone')->nullable();
            $table->string('calendar_id')->required()->nullable();
            $table->softDeletes(); 
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
        Schema::dropIfExists('properties');
    }
}
