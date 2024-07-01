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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian'); // ini akan menjadi bigInteger unsigned
            $table->unsignedBigInteger('session_id');
            $table->string('materi_penilaian');
            $table->integer('bobot');
            $table->decimal('skor', 5, 2);
            $table->text('revisi')->nullable();
            $table->timestamps();

        });
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('session_id')->references('id_session')->on('sessions')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
