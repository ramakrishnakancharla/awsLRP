<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addfriendsrelatives extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addfriendsrelatives', function (Blueprint $table) {
            $table->increments('AFR_ID');
            $table->string('Title');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName');
            $table->string('Gender')->nullable();
            $table->date('DOB')->nullable();
            $table->string('MobileNo')->nullable();
            $table->string('Age');
            $table->string('Nationality');
            $table->string('Religion');
            $table->string('MaritalStatus');
            $table->date('MarriedSince')->nullable();
            $table->integer('NoOfChildrens')->nullable();
            $table->integer('Txnuser');
            $table->integer('Status');
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
        Schema::dropIfExists('addfriendsrelatives');
    }
}
