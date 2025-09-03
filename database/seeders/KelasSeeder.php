<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kelas = ['X RPl-1', 'X RPL-2', 'XI RPL-1', 'XI RPL-2'];
        foreach ($kelas as $item) {
            Kelas::create([
                'nama_kelas' => $item,
                'tingkat' => explode(' ', $item)[0]
            ]);
        }
    }
}
