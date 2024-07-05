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
            $table->bigIncrements('id_ta');
            $table->string('nim');
            $table->string('nama');
            $table->string('judul');
            $table->date('tgl_pengajuan');
            $table->string('file');
            $table->string('file_name');
            $table->string('dokumen_pkl');
            $table->string('proposal');
            $table->string('lembar_bimbingan');
            $table->bigInteger('pembimbing1')->unsigned();
            $table->bigInteger('pembimbing2')->unsigned();
           
        });
        Schema::table('thesis', function (Blueprint $table) {
            // $table->foreign('student_id')->references('id_student')->on('students')
            //         ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pembimbing1')->references('id_lecturer')->on('lecturers')
                     ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pembimbing2')->references('id_lecturer')->on('lecturers')
                    ->onUpdate('cascade')->onDelete('cascade');
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
