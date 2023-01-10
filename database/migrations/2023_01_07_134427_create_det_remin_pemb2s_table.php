<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetReminPemb2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_remin_pemb2s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('reminPembId')->unsigned();
            $table->string('semester')->nullable();
            $table->string('sisaBP3')->nullable();
            $table->string('sisaFPU')->nullable();
            $table->string('sisaSKS-1')->nullable();
            $table->string('sisaSKS-2')->nullable();
            $table->string('sisaDP3')->nullable();
            $table->string('sisaAlat')->nullable();
            $table->string('sisaLab')->nullable();
            $table->string('sisaBuku')->nullable();
            $table->string('totalTunggakan')->nullable();
            $table->date('jatemBP3')->nullable();
            $table->date('jatemFPU')->nullable();
            $table->date('jatemSKS-1')->nullable();
            $table->date('jatemSKS-2')->nullable();
            $table->date('jatemDP3')->nullable();
            $table->date('jatemAlat')->nullable();
            $table->date('jatemLab')->nullable();
            $table->date('jatemBuku')->nullable();
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
        Schema::dropIfExists('det_remin_pemb2s');
    }
}
