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
        Schema::create('validasi_ta', function (Blueprint $table) {
            $table->id('id_validasi');
            $table->unsignedBigInteger('ta_id');
            $table->string('komentar');
            $table->string('status');
        });

        Schema::table('validasi_ta', function (Blueprint $table) {
            $table->foreign('ta_id')->references('id_ta')->on('thesis')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validasi_ta');
    }
};
