<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addfamilymembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addfamilymembers', function (Blueprint $table) {
            $table->increments('AFM_ID');
            $table->integer('Parent')->nullable();
            $table->integer('Child')->nullable();
            $table->integer('Priority')->nullable();
            $table->string('Title');
            $table->string('FirstName');
            $table->string('MiddleName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Gender')->nullable();
            $table->date('DOB')->nullable();
            $table->string('MobileNo')->nullable();
            $table->string('Image')->nullable();
			$table->string('Folder')->nullable();
            $table->string('Age');
            $table->string('Relationship')->nullable();
            $table->string('Nationality');
            $table->string('Religion');
            $table->string('MaritalStatus');
            $table->date('MarriedSince')->nullable();
            $table->integer('NoOfChildrens')->nullable();
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
        Schema::dropIfExists('addfamilymembers');
    }
}
