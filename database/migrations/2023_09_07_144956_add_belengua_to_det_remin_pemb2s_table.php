<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBelenguaToDetReminPemb2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('det_remin_pemb2s', function (Blueprint $table) {
            $table->string('beelinguaFee')->after('sisaBuku')->nullable();
            $table->date('jatemBeelingua')->after('jatemBuku')->nullable();
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
            $table->dropColumn('beelinguaFee');
            $table->dropColumn('jatemBeelingua');
        });
    }
}
