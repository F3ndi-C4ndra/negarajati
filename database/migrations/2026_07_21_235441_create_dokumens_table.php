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
    Schema::create('dokumens', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('kategori'); // Misal: Peraturan Desa, SK Kades, Transparansi APBD
        $table->string('tahun');
        $table->string('file_path'); // Menyimpan path file PDF/Doc
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
