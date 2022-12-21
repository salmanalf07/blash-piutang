<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateW2bcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('w2bcs', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('name');
            $table->string('no_kelompok');
            $table->string('nama_kelompok');
            $table->string('email');
            $table->string('link_wa');
            $table->string('list_kelompok');
            $table->string('daebak_tgl');
            $table->string('daebak_jam');
            $table->string('gee_tgl');
            $table->string('gee_jam');
            $table->string('wardah_tgl');
            $table->string('wardah_jam');
            $table->string('status');
            $table->softDeletes();
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
        Schema::dropIfExists('w2bcs');
    }
}
