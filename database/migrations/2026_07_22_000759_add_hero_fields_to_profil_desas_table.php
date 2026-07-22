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
    Schema::table('profil_desas', function (Blueprint $table) {
        $table->string('hero_title')->default('Selamat Datang di Portal Informasi Desa Negarajati')->nullable();
        $table->string('hero_subtitle')->default('Kecamatan Cimanggu, Kabupaten Cilacap, Jawa Tengah')->nullable();
        $table->string('hero_image')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profil_desas', function (Blueprint $table) {
            //
        });
    }
};
