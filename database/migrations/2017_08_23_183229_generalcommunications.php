<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalcommunications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalcommunications', function (Blueprint $table) {
            $table->increments('GC_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->date('ValidFrom');
            $table->date('ValidTo');
			$table->string('CommunicationType')->nullable();
			$table->text('Details')->nullable();
			$table->string('Image')->nullable();
			$table->string('Folder')->nullable();
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
        Schema::dropIfExists('generalcommunications');
    }
}
