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
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id_student');
            $table->string('nim')->unique();
            $table->string('name');
            $table->unsignedBigInteger('prodi_id');
            $table->string('force');
           
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('prodi_id')->references('id_prodi')->on('prodis')
                    ->onUpdate('cascade')->onDelete('cascade');
    });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
