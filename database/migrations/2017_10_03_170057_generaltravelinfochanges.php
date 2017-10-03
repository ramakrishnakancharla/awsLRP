<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generaltravelinfochanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generaltravelinfo', function($table) {
			$table->renameColumn('Image', 'DocImage')->nullable();
			$table->integer('DocType')->nullable();
			$table->string('DocNo')->nullable();
			$table->string('AdditionalDestination');
			$table->string('EstimatedCost');
			$table->integer('TravelInsurancePolicyNo');
			$table->integer('ModeOfTrasnport');
			$table->string('Destination');
			$table->integer('TravelInsuranceAvailable');
			$table->string('ActualCost');
			$table->string('AdditonalCost');
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generaltravelinfo', function($table) {
			$table->renameColumn('DocImage', 'Image');
		});
    }
}
