<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('icon')->nullable();
            $table->integer('parent')->nullable()->default(0);
            $table->string('url')->nullable()->default('#');
            $table->string('classname')->nullable();
            $table->integer('order')->nullable();
            $table->enum('show_in', ['frontend', 'backend'])->default('backend');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
