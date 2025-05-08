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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('pelamar_id')->constrained('pelamars')->onDelete('cascade');
            $table->string('kode_karyawan')->unique();
            $table->string('password');
            $table->string('nik_ktp');
            $table->string('nama_karyawan');
            $table->string('email')->unique();
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
            $table->string('jabatan')->nullable();
            $table->date('tanggal_mulai_kerja')->nullable();
            $table->foreignId('unit_kerja_id')->constrained('unit_kerjas')->onDelete('cascade');
            $table->string('foto_karyawan')->nullable();
            $table->string('dokumen_karyawan')->nullable();
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
