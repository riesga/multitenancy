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
            $table->string('first_name');
            $table->string('second_name');
            $table->string('last_name');
            $table->string('second_last_name');
            $table->string('company');
            $table->smallInteger('document_type')->comment('Tipo documento identidad');
            $table->smallInteger('tax regime')->comment('Tipo regimen contributivo');
            $table->string('company_type',1)->comment('Tipo empresa natural o juridica');
            $table->string('nit');
            $table->string('check_digit')->comment('Digito verificación nit');
            $table->string('ciiu');
            $table->integer('code_postal');
            $table->smallInteger('stratum')->comment('Estrato economico');
            $table->string('address');
            $table->string('country');
            $table->string('department');
            $table->string('municipality');
            $table->string('telephone');
            $table->string('state');
            $table->string('plan');
            $table->string('comments');
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
