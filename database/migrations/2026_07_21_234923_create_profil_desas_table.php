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
    Schema::create('profil_desas', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kades')->default('Sartono, S.H.');
        $table->string('foto_kades')->nullable();
        $table->text('sambutan_kades')->nullable();
        $table->text('sejarah_desa')->nullable();
        $table->text('visi')->nullable();
        $table->text('misi')->nullable();
        $table->text('alamat_kantor')->nullable();
        $table->string('no_telepon')->nullable();
        $table->string('email_desa')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_desas');
    }
};
