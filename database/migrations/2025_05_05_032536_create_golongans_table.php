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
        Schema::create('golongans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_golongan')->nullable();
            $table->string('kode_golongan');
            $table->integer('kumulatif')->nullable();
            $table->string('pangkat')->nullable();
            $table->foreignId('jabatan_akademik_id')->constrained('jabatan_akademiks')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golongans');
    }
};
