<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeriodeCutiToReminderPembayaranBolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminder_pembayaran_bols', function (Blueprint $table) {
            $table->string('periodeCuti')->after('dateEd_ujian')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reminder_pembayaran_bols', function (Blueprint $table) {
            $table->dropColumn('periodeCuti');
        });
    }
}
