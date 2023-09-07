<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteJetemToReminderPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminder_pembayarans', function (Blueprint $table) {
            $table->dropColumn('jatem');
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
            $table->date('jatem')->after('semester_now')->nullable();
        });
    }
}
