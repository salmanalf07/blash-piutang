<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDaftarUlangToDetReminPemb2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('det_remin_pemb2s', function (Blueprint $table) {
            $table->string('daftarUlang')->after('semester')->nullable();
            $table->date('jatemDaftarUlang')->after('totalTunggakan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('det_remin_pemb2s', function (Blueprint $table) {
            $table->dropColumn('daftarUlang');
            $table->dropColumn('jatemDaftarUlang');
        });
    }
}
