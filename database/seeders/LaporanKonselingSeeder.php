<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LaporanKonseling;
use App\Models\Siswa;
use App\Models\User;
use Faker\Factory as Faker;

class LaporanKonselingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
        $siswaIds = Siswa::pluck('id')->toArray();

        for ($i = 1; $i <= 5; $i++) {
            LaporanKonseling::create([
                'tanggal' => $faker->date(),
                'siswa_id' => $faker->randomElement($siswaIds),
                'masalah' => $faker->sentence(3),
                'penyebab' => $faker->sentence(4),
                'kesimpulan_masalah' => $faker->sentence(6),
                'penyelesaian' => $faker->paragraph,
                'evaluasi' => 'efektif',
            ]);
        }
    }
}
