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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('pelamar_id')->nullable()->constrained('pelamars')->onDelete('cascade');
            $table->string('kode_karyawan')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('nik_ktp')->unique()->nullable();
            $table->string('nama_karyawan');
            $table->integer('umur')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_npwp')->nullable();
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('pendidikan_tertinggi')->nullable();
            $table->string('ikatan_kerja')->nullable();
            $table->date('akhir_ikatan_kerja')->nullable();
            $table->string('jabatan')->nullable();
            $table->date('tanggal_mulai_kerja')->nullable();
            $table->foreignId('kat_unit_kerja_id')->nullable()->constrained('kat_unit_kerjas')->onDelete('cascade');
            $table->string('foto_karyawan')->nullable();
            $table->string('dokumen_karyawan')->nullable();
            $table->enum('status_aktivasi', ['aktif', 'tidak_aktif'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
