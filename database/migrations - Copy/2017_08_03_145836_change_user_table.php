<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // adding columns to users table
      Schema::table('users', function (Blueprint $table) {
        $table->string('email')->nullable()->change();
        $table->string('l_name')->after('name')->nullable();
        $table->string('mobile')->after('email')->nullable()->unique();
        $table->date('dob')->after('mobile')->nullable();
        $table->enum('gender',['male','female','others'])->after('dob')->nullable();
        $table->string('photo_path')->after('gender')->nullable();
        $table->boolean('status')->after('photo_path')->default();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
