<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReminderKrs3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_krs3s', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('nim');
            $table->string('name');
            $table->string('email');
            $table->string('semester');
            $table->string('date_regist');
            $table->date('jatem')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('reminder_krs3s');
    }
}
