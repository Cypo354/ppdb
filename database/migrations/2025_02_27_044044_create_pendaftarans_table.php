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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id('pendaftaran_id');
            $table->enum('jenis_pendaftaran', ['Baru', 'Pindahan'])->default('Baru');
            $table->unsignedBigInteger('jurusan_dipilih'); // Merujuk ke tabel jurusan
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('nisn')->unique();
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('agama', ['Islam', 'Kristen', 'Katholik', 'Buddha', 'Hindu', 'Konghuchu']);
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('sekolah_asal');
            $table->string('email');
            $table->text('alamat_jalan');
            $table->string('rt');
            $table->string('rw');
            $table->string('dusun');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('kode_pos');
            $table->string('status')->default('Tidak Aktif');
            $table->string('kode_unik')->unique();
            // Kolom untuk unggah file
            $table->string('pas_foto')->nullable();
            $table->string('skhun')->nullable();
            $table->string('ktp')->nullable();
            $table->string('kk')->nullable();
            $table->string('akta')->nullable();
            $table->string('kip')->nullable();
            $table->timestamps();

            //table->foreignId('jurusan_dipilih')->constrained('jurusans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
