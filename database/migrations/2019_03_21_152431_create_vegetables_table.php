<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVegetablesTable extends Migration
{

    public function up()
    {
      Schema::create('vegetables', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->timestamps();
       });
    }


    public function down()
    {
      Schema::dropIfExists('vegetables');
    }
}
