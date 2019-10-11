<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToWorksTable extends Migration
{
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropForeign('user_id');
        });
    }
}
