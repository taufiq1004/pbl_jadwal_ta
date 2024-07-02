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
            $table->id();
            $table->bigInteger('ta_id')->unsigned();
            $table->string('jabatan');
            $table->bigInteger('pembimbing1_id')->unsigned();
            $table->decimal('presentasi_sikap_penampilan', 5, 2);
            $table->decimal('presentasi_komunikasi_sistematika', 5, 2);
            $table->decimal('presentasi_penguasaan_materi', 5, 2);
            $table->decimal('makalah_identifikasi_masalah', 5, 2);
            $table->decimal('makalah_relevansi_teori', 5, 2);
            $table->decimal('makalah_metode_algoritma', 5, 2);
            $table->decimal('makalah_hasil_pembahasan', 5, 2);
            $table->decimal('makalah_kesimpulan_saran', 5, 2);
            $table->decimal('makalah_bahasa_tata_tulis', 5, 2);
            $table->decimal('produk_kesesuaian_fungsional', 5, 2);
            $table->decimal('total_nilai', 5, 2);
            $table->text('komentar')->nullable();
            $table->timestamps();

        });
        Schema::table('penilaian', function (Blueprint $table) {
            $table->foreign('pembimbing1_id')->references('id_lecturer')->on('lecturers')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ta_id')->references('id_ta')->on('thesis')
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
