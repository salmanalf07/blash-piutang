<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetReminPemb1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_remin_pemb1s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reminPembId')->unsigned();
            $table->string('semester');
            $table->string('sisaBP3');
            $table->string('sisaFPU');
            $table->string('sisaSKS-1');
            $table->string('sisaSKS-2');
            $table->string('sisaDP3');
            $table->string('sisaAlat');
            $table->string('sisaLab');
            $table->string('sisaBuku');
            $table->string('totalTunggakan');
            $table->date('jatemBP3');
            $table->date('jatemFPU');
            $table->date('jatemSKS-1');
            $table->date('jatemSKS-2');
            $table->date('jatemDP3');
            $table->date('jatemAlat');
            $table->date('jatemLab');
            $table->date('jatemBuku');
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
        Schema::dropIfExists('det_remin_pemb1s');
    }
}
