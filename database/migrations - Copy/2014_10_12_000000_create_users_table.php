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
			$table->string('l_name')->nullable();
			$table->string('email')->nullable()->change();
			$table->string('password');
			$table->string('mobile')->nullable()->unique();
			$table->date('dob')->nullable();
			$table->integer('gender')->nullable();
			$table->string('photo_path')->nullable();
			$table->boolean('status')->default();
            
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
