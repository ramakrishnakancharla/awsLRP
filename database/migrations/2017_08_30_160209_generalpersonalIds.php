<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GeneralpersonalIds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalpersonalIds', function (Blueprint $table) {
            $table->increments('GPI_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('IDType');
            $table->string('IDNO');
            $table->string('PlaceOfIssue')->nullable();
            $table->string('CountryOfIssue');
            $table->string('Country')->nullable();
            $table->string('Region')->nullable();
            $table->string('IssueingAuthority')->nullable();
            $table->date('DateOfIssue');
            $table->string('Image')->nullable();
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
        Schema::dropIfExists('generalpersonalIds');
    }
}
