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
        Schema::create('kaprodis', function (Blueprint $table) {
            $table->increments('id_kaprodi');
            $table->string('nidn')->unique();
            $table->string('name');
            $table->unsignedBigInteger('prodi_id');
        });

        Schema::table('kaprodis', function (Blueprint $table) {
            $table->foreign('prodi_id')->references('id_prodi')->on('prodis')
                    ->onUpdate('cascade')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaprodis');
    }
};
