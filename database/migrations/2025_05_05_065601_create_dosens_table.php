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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('pelamar_id')->nullable()->constrained('pelamars')->onDelete('cascade');
            $table->string('kode_dosen')->nullable();
            $table->string('password')->nullable();
            $table->string('nik_ktp')->nullable();
            $table->string('nip')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('nama_dosen');
            $table->integer('umur')->nullable();
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('no_npwp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->foreignId('fakultas_id')->nullable()->constrained('fakultas')->onDelete('cascade');
            $table->foreignId('prodi_id')->nullable()->constrained('prodis')->onDelete('cascade');
            $table->string('bidang_ilmu_kompetensi')->nullable();
            $table->string('ikatan_kerja')->nullable();
            $table->date('tanggal_mulai_kerja')->nullable();
            $table->date('akhir_ikatan_kerja')->nullable();
            $table->string('pendidikan_tertinggi')->nullable();
            $table->foreignId('jabatan_akademik_id')->nullable()->constrained('jabatan_akademiks')->onDelete('cascade');
            $table->foreignId('golongan_id')->nullable()->constrained('golongans')->onDelete('cascade');
            $table->enum('status_aktivasi', ['aktif', 'tidak_aktif'])->nullable();
            $table->string('foto_dosen')->nullable();
            $table->string('dokumen_dosen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
