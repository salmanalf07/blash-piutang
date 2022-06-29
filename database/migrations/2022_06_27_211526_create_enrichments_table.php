<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrichmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrichments', function (Blueprint $table) {
            $table->id();
            $table->string('semester');
            $table->string('nim');
            $table->string('mahasiswa');
            $table->string('email');
            $table->date('tgl_konfirm')->nullable();
            $table->string('bp3')->nullable();
            $table->date('bp3_tempo')->nullable();
            $table->string('sks')->nullable();
            $table->date('sks_tempo')->nullable();
            $table->longText('i_tambahan')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('enrichments');
    }
}
