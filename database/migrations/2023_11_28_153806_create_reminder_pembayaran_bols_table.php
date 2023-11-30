<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReminderPembayaranBolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_pembayaran_bols', function (Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('name');
            $table->string('email');
            $table->string('email_cc1')->nullable();
            $table->string('semester');
            $table->string('periode_kuliah');
            $table->date('date_kuliah');
            $table->string('periode_ujian');
            $table->date('dateSt_ujian');
            $table->date('dateEd_ujian');
            $table->string('status')->default('OPEN');
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
        Schema::dropIfExists('reminder_pembayaran_bols');
    }
}
