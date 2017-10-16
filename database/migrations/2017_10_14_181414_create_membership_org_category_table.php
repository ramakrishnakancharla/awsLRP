<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipOrgCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_membership_org_category_master', function (Blueprint $table) {
            $table->increments('MOCM_ID');
            $table->string('Name')->nullable();
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
        Schema::dropIfExists('common_membership_org_category_master');
    }
}
