<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generaltravelinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generaltravelinfo', function (Blueprint $table) {
            $table->increments('GTI_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->date('FromDate');
            $table->time('FromTime')->nullable();
            $table->date('ToDate');
            $table->time('ToTime')->nullable();
            $table->string('Country');
            $table->string('Region')->nullable();
            $table->string('Purpose')->nullable();
            $table->string('OtherPurpose')->nullable();
            $table->longText('Comments')->nullable();
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
        Schema::dropIfExists('generaltravelinfo');
    }
}
