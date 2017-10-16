<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipSponcerorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_membership_sponceror_master', function (Blueprint $table) {
            $table->increments('MSM_ID');
            $table->string('Name')->nullable();
			$table->integer('Status')->default(1);
            $table->integer('Txnuser')->default(1);
            $table->rememberToken();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_membership_sponceror_master');
    }
}
