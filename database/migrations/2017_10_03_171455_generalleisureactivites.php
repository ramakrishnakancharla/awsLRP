<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalleisureactivites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_leisureactivites', function (Blueprint $table) {
            $table->increments('GLA_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('Activity')->nullable();
            $table->integer('Prociency')->nullable();
            $table->string('Skills')->nullable();
            $table->string('Hobby')->nullable();
            $table->integer('ActivityType')->nullable();
            $table->integer('SkillsAcquired')->nullable();
            $table->string('GuideMentorCouch')->nullable();
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
        Schema::dropIfExists('general_leisureactivites');
    }
}
