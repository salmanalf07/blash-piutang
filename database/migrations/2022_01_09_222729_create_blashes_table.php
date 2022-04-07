<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blashes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('campus_id');
            $table->bigInteger('no_letter');
            $table->integer('no_test');
            $table->integer('nim');
            $table->string('name');
            $table->string('program');
            $table->string('mail_mhs');
            $table->string('level');
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
        Schema::dropIfExists('blashes');
    }
}
