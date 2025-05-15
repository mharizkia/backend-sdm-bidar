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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama_pelamar');
            $table->string('nidn')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('pendidikan_tertinggi');
            $table->integer('umur');
            $table->decimal('ipk', 4, 2);
            $table->string('bidang_ilmu_kompetensi');
            $table->enum('pilihan_lamaran', ['dosen', 'karyawan']);
            $table->date('tanggal_lamaran');
            $table->string('dokumen_lamaran');
            $table->enum('status', ['terima', 'tolak', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamars');
    }
};