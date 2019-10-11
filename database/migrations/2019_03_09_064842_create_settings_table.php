<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appname');
            $table->string('subname');
            $table->string('skin');
            $table->string('copyright');
            $table->string('version');
            $table->string('poster');
            $table->string('logo');
            $table->string('bg');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
