<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaidToReminderPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reminder_pembayarans', function (Blueprint $table) {
            $table->string('email_cc1')->after('email')->nullable();
            $table->string('email_cc2')->after('email_cc1')->nullable();
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
            //
        });
    }
}
