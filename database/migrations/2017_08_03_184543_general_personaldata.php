<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralPersonaldata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('generalpersonaldata', function (Blueprint $table) {
            $table->increments('GPD_ID');
            $table->integer('MetaID');
            $table->string('ToWhom');
            $table->string('Title');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Gender');
            $table->date('DOB');
            $table->string('Age');
            $table->string('Nationality');
            $table->string('Religion');
            $table->string('MaritalStatus');
            $table->date('MarriedSince')->nullable();
            $table->integer('NoOfChildrens')->nullable();
            $table->date('ValidFrom');
            $table->date('ValidTo');
            $table->integer('Status');
            $table->integer('Txnuser');
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
        Schema::dropIfExists('generalpersonaldata');
    }
}
