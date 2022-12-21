<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReaktifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reaktifs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('surat_id')->nullable();
            $table->bigInteger('template_id')->nullable();
            $table->string('semester');
            $table->string('nim');
            $table->string('mahasiswa');
            $table->string('email');
            $table->longText('i_tambahan')->nullable();
            $table->date('tgl_batas');
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
        Schema::dropIfExists('reaktifs');
    }
}
