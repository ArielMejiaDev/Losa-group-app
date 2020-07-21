<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('contact_id')->nullable()->nullable();
            $table->string('dpi')->nullable()->nullable();
            $table->date('vencimiento_dpi')->nullable()->nullable();
            $table->string('licencia_conducir')->nullable()->nullable();
            $table->date('vencimiento_licencia')->nullable()->nullable();
            $table->string('visa')->nullable()->nullable();
            $table->date('vencimiento_visa')->nullable()->nullable();
            $table->string('pasaporte')->nullable()->nullable();
            $table->date('vencimiento_pasaporte')->nullable()->nullable();
            $table->string('seguro_vida')->nullable()->nullable();
            $table->string('seguro_medico')->nullable()->nullable();
            $table->string('tipo_sangre')->nullable()->nullable();
            $table->string('celular')->nullable()->nullable();
            $table->boolean('contacto_losa')->default(0)->nullable();
            $table->boolean('status_app')->default(0)->nullable();
            $table->string('role')->default('user')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('crm_status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
