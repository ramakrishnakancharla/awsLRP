<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Generalmembership extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_membership', function (Blueprint $table) {
            $table->increments('GMS_ID');
            $table->integer('MetaID');
            $table->integer('ToWhom');
            $table->string('OrganizationName');
            $table->integer('MembershipType');
            $table->string('MembershipFees')->nullable();
            $table->integer('AllowedForMembers');
            $table->integer('OrganizationCategory')->nullable();
            $table->integer('MembershipNo')->nullable();
            $table->string('Sponceror')->nullable();
            $table->string('OptionsFacilities')->nullable();
            $table->string('Facilities')->nullable();
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
        Schema::dropIfExists('general_membership');
    }
}
