<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generaldocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_documents', function (Blueprint $table) {
            $table->increments('GD_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('DocCategory')->nullable();
            $table->string('FileChoose')->nullable();
            $table->string('LinkTo')->nullable();
            $table->string('DocImage')->nullable();
            $table->string('DocType')->nullable();
            $table->string('DocNo')->nullable();
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
        Schema::dropIfExists('general_documents');
    }
}
