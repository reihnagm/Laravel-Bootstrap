<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('position')->nullable();
            $table->string('office')->nullable();
            $table->string('place');
            $table->integer('year_in');
            $table->integer('year_out')->nullable();
            $table->enum('current', ['yes', 'no']);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('works');
    }
}
