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
        Schema::create('detail_sessions', function (Blueprint $table) {
            $table->id('id_detail');
            $table->string('nim_student');
            $table->unsignedBigInteger('ta_id');
            $table->string('grade');
        });
        
        Schema::table('detail_sessions', function (Blueprint $table) {
            $table->foreign('nim_student')->references('nim')->on('students')
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
        Schema::dropIfExists('detail__sessions');
    }
};
