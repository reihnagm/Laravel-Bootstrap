<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname')->unique();
            $table->string('fullname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender', ['m', 'f']);
            $table->bigInteger('village_id')->nullable()->unsigned();
            $table->string('address')->nullable();
            $table->integer('postcode')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('photo')->nullable();
            $table->string('banner')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('skin')->nullable();
            $table->rememberToken();
            $table->timestamps();
    });

        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('village_id')->references('id')->on('villages')->onDelete('cascade');
        // });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
