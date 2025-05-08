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
            $table->string('nama_pelamar');
            $table->string('nidn')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('pendidikan_tertinggi');
            $table->integer('usia');
            $table->decimal('ipk');
            $table->string('bidang_ilmu_kompetensi');
            $table->string('pilihan_lamaran');
            $table->date('tanggal_lamaran');
            $table->string('dokumen_lamaran');
            $table->boolean('status')->default(true);
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
