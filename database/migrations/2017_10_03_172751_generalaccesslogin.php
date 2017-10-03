<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalaccesslogin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_accesslogin', function (Blueprint $table) {
            $table->increments('GAL_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('Account')->nullable();
            $table->string('UserID')->nullable();
            $table->string('NickName')->nullable();
            $table->string('Password')->nullable();
            $table->string('PhoneNo')->nullable();
            $table->integer('Category')->nullable();
            $table->string('URL')->nullable();
            $table->string('EmailID')->nullable();
            $table->string('Purpose')->nullable();
            $table->string('Notes')->nullable();
            $table->string('HintQ1')->nullable();
            $table->string('HintQ1Ans')->nullable();
            $table->string('HintQ2')->nullable();
            $table->string('HintQ2Ans')->nullable();
            $table->string('HintQ3')->nullable();
            $table->string('HintQ3Ans')->nullable();
            $table->date('ValidFrom')->nullable();
            $table->date('ValidTo')->nullable();
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
        Schema::dropIfExists('general_accesslogin');
    }
}
