<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kependudukans', function (Blueprint $table) {
            $table->id();
            $table->integer('total_warga')->default(0);
            $table->integer('laki_laki')->default(0);
            $table->integer('perempuan')->default(0);
            $table->integer('kepala_keluarga')->default(0);
            $table->integer('rt')->default(0);
            $table->integer('rw')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kependudukans');
    }
};