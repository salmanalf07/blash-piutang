<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTglAutodebetToReminderPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminder_pembayarans', function (Blueprint $table) {
            $table->date('autoDebet')->after('semester_now')->nullable();
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
            $table->dropColumn('autoDebet');
        });
    }
}
