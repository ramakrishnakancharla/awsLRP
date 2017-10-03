<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalphotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('general_photos', function (Blueprint $table) {
            $table->increments('GPH_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('Photo')->nullable();
            $table->string('Dimention')->nullable();
            $table->string('MatFinish')->nullable();
            $table->string('Options')->nullable();
            $table->string('GlassFinish')->nullable();
            $table->string('PassportSize')->nullable();
            $table->string('Folder')->nullable();
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
        Schema::dropIfExists('general_photos');
    }
}
