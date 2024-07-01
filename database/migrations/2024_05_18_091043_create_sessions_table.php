<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('id_session');
            $table->string('nim_student');
            $table->unsignedBigInteger('ta_id');
            $table->string('ketua_sidang');
            $table->string('sekretaris');
            $table->string('anggota');
            $table->unsignedBigInteger('no_room');
            $table->string('sesi');
            $table->date('date_session');
           // $table->timestamps();
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('nim_student')->references('nim')->on('students')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ta_id')->references('id_ta')->on('thesis')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ketua_sidang')->references('nidn')->on('lecturers')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sekretaris')->references('nidn')->on('lecturers')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('anggota')->references('nidn')->on('lecturers')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('no_room')->references('id_room')->on('rooms')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sesi')->references('sesi')->on('sesi')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
