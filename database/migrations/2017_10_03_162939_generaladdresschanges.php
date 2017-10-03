<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generaladdresschanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generaladdress', function($table) {
			$table->renameColumn('Image', 'DocImage');
			$table->integer('DocType');
			$table->string('DocNo');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generaladdress', function($table) {
			$table->renameColumn('DocImage', 'Image');
		});
    }
}
