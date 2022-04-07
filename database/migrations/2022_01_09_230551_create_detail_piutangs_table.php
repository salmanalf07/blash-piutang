<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_piutangs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blash_id');
            $table->string('type_payment');
            $table->string('no_bsb');
            $table->date('date_payment');
            $table->integer('ammount');
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
        Schema::dropIfExists('detail_piutangs');
    }
}
