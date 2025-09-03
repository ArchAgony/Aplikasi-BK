<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evaluasi;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Kelas;
use Faker\Factory as Faker;

class EvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
        $guruIds = User::pluck('id')->toArray();
        $siswaIds = Siswa::pluck('id')->toArray();
        $kelasIds = Kelas::pluck('id')->toArray();

        for ($i = 1; $i <= 12; $i++) {
            Evaluasi::create([
                'tanggal' => $faker->date(),
                'siswa_id' => $faker->randomElement($siswaIds),
                'guru_id' => $faker->randomElement($guruIds),
                'kelas_id' => $faker->randomElement($kelasIds),
                'masalah' => $faker->sentence(3),
                'penyebab' => $faker->sentence(4),
                'hasil_laporan_konseling' => $faker->sentence(6),
                'tindak_lanjut' => $faker->sentence(6),
                'ttd_path' => 'signature.png',
            ]);
        }
    }
}
