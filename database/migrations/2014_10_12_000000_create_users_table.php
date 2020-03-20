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
            $table->id('user_id');
	        $table->string('first_name');
	        $table->string('last_name');
	        $table->string('user_name')->unique();
	        $table->string('email')->unique();
	        $table->string('cellphone')->nullable();
	        $table->timestamp('email_verified_at')->nullable();
	        $table->string('department_id');
	        $table->string('password');
	        $table->bigInteger('birth_date')->nullable()->unsigned();
	        $table->string('language', 10)->default('en');
	        $table->tinyInteger('calendar_type')->unsigned()->default(1);
	        $table->string('company')->nullable();
	        $table->rememberToken();
	        $table->bigInteger('expiration_date')->nullable()->unsigned();
	        $table->bigInteger('updated_at')->unsigned();
	        $table->bigInteger('created_at')->unsigned();
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
