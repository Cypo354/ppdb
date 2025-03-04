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
        Schema::create('form_fields', function (Blueprint $table) {
            $table->id();
            $table->string('nama_field'); // Nama kolom (misal: nisn, nama, dll)
            $table->string('label'); // Label tampilan (misal: NISN)
            $table->string('tipe'); // Jenis input (text, email, select, file, dll)
            $table->json('opsi')->nullable(); // Jika select atau radio, simpan opsinya
            $table->boolean('wajib')->default(true); // Apakah field wajib diisi
            $table->integer('urutan')->default(0); // Urutan field dalam form
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_fields');
    }
};
