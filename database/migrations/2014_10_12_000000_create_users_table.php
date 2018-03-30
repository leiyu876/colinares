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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name', 100)->nullable();
            $table->string('nick_name', 100)->nullable();
            $table->date('birthday')->nullable();
            $table->char('gender', 1)->nullable();
            $table->date('lastday')->nullable();
            $table->char('marital_status', 1)->nullable();
            $table->char('nationality', 10)->nullable();
            $table->char('religion', 10)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('degree', 255)->nullable();
            $table->integer('married_to')->nullable();
            $table->date('married_date')->nullable();
            $table->integer('color_code')->nullable();
            $table->string('home_address', 255)->nullable();
            $table->string('current_address', 255)->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('company_address', 255)->nullable();
            $table->string('company_phone', 100)->nullable();
            $table->string('password_expire')->nullable();
            $table->string('last_login')->nullable();
            $table->string('status')->nullable();
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
