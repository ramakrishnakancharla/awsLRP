<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalobjectsonloan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_objectsonloan', function (Blueprint $table) {
            $table->increments('GOL_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('ObjectName');
            $table->integer('ObjectCategory');
            $table->integer('GivenTo')->nullable();
            $table->integer('EmailID');
            $table->integer('PlaceOfIssue')->nullable();
            $table->integer('ValueAddition')->nullable();
            $table->date('GivenDate')->nullable();
            $table->string('Amount')->nullable();
            $table->string('ContactNo')->nullable();
            $table->string('Address')->nullable();
            $table->string('Purpose')->nullable();
            $table->string('ModeOfGiving')->nullable();
            $table->string('ModeOfReturning')->nullable();
            $table->date('DateOfIssue')->nullable();
            $table->date('ReturnDate')->nullable();
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
        Schema::dropIfExists('general_objectsonloan');
    }
}
