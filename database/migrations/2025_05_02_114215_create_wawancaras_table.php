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
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained('pelamars')->onDelete('cascade');
            $table->foreignId('pewawancara_id')->constrained('pewawancaras')->onDelete('cascade');
            $table->string('nama_pewawancara');
            $table->date('tanggal_wawancara');
            $table->string('poin_poin_wawancara');
            $table->string('kesimpulan');
            $table->enum('status', ['lulus', 'tidak_lulus'])->default('tidak_lulus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wawancaras');
    }
};
