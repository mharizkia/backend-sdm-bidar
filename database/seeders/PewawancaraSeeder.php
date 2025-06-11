<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pewawancara;
use Illuminate\Database\Seeder;

class PewawancaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Pewawancara::create([
            'jabatan_pewawancara' => 'Dekan',
            'dokumen_pewawancara' => 'pewawancara/Dekan.pdf',
        ]);

        Pewawancara::create([
            'jabatan_pewawancara' => 'Kaprodi',
            'dokumen_pewawancara' => 'pewawancara/Kaprodi.pdf',
        ]);

        Pewawancara::create([
            'jabatan_pewawancara' => 'Warek SDM',
            'dokumen_pewawancara' => 'pewawancara/Warek_SDM.pdf',
        ]);
    }
}
