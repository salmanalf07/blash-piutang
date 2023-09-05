<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddITambahan1ToReminderPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminder_pembayarans', function (Blueprint $table) {
            $table->longText('i_tambahan_1')->after('i_tambahan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reminder_pembayarans', function (Blueprint $table) {
            $table->dropColumn('i_tambahan_1');
        });
    }
}
