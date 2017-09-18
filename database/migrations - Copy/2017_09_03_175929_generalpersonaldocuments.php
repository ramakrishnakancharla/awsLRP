<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalpersonaldocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalpersonaldocuments', function (Blueprint $table) {
            $table->increments('GPD_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->date('ValidFrom');
            $table->date('ValidTo');
            $table->string('DocCategory');
            $table->string('DocName')->nullable();
            $table->string('DocBelongs')->nullable();
            $table->string('Module')->nullable();
            $table->string('FollowUp')->nullable();
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
        Schema::dropIfExists('generalpersonaldocuments');
    }
}
