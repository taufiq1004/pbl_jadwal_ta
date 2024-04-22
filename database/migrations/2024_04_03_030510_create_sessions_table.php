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
            $table->string('nidn_supervisor');
            $table->string('nidn_examiner');
            $table->string('nidn_kaprodi');
            $table->string('number_room');
            $table->date('date_session');
            $table->string('final_score');
            $table->string('status');
           // $table->timestamps();
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('nim_student')->references('nim')->on('students')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ta_id')->references('id_ta')->on('thesis')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nidn_supervisor')->references('nidn')->on('supervisors')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nidn_examiner')->references('nidn')->on('examiners')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nidn_kaprodi')->references('nidn')->on('kaprodis')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('number_room')->references('no_room')->on('rooms')
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
