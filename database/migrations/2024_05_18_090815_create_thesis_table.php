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
        Schema::create('thesis', function (Blueprint $table) {
            $table->id('id_ta');
            $table->string('nim_student');
            $table->string('judul');
            $table->date('tgl_pengajuan');
            $table->string('file');
            $table->string('file_name');
            // $table->string('nidn_supervisor');
            // $table->string('nidn_examiner');
           
        });
        Schema::table('thesis', function (Blueprint $table) {
            $table->foreign('nim_student')->references('nim')->on('students')
                    ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('nidn_supervisor')->references('nidn')->on('supervisors')
            //         ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('nidn_examiner')->references('nidn')->on('examiners')
            //         ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thesis');
    }
};
