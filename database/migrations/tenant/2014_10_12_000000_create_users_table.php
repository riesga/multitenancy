<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('code_client');
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('second_last_name')->nullable();
            $table->string('company');
            $table->smallInteger('document_type')->comment('Tipo documento identidad');
            $table->smallInteger('tax_regime')->comment('Tipo regimen contributivo');
            $table->string('company_type',1)->comment('Tipo empresa natural o juridica');
            $table->string('nit',15);
            $table->smallInteger('check_digit')->comment('Digito verificación nit');
            $table->string('ciiu',10)->nullable();
            $table->integer('code_postal')->nullable();
            $table->smallInteger('stratum')->comment('Estrato economico');
            $table->string('address');
            $table->string('country');
            $table->string('department');
            $table->string('municipality');
            $table->string('telephone');
            $table->smallInteger('state');
            $table->smallInteger('plan');
            $table->string('comments')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
