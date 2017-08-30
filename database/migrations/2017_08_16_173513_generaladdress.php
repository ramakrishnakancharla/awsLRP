<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generaladdress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generaladdress', function (Blueprint $table) {
            $table->increments('GA_ID');
            $table->integer('MetaID');
            $table->string('UserID');
            $table->string('AddressType');
            $table->string('HouseNo');
            $table->string('Street');
            $table->text('AddressLine');
            $table->string('City');
            $table->string('Country');
            $table->string('PostalCode');
            $table->text('GeographicalAddress');
            $table->date('ValidFrom');
            $table->date('ValidTo');
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
        Schema::dropIfExists('generaladdress');
    }
}
