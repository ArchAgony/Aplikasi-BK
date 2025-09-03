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
        $guruIds = User::pluck('id')->toArray();
        $siswaIds = Siswa::pluck('id')->toArray();

        for ($i = 1; $i <= 10; $i++) {
            LaporanKonseling::create([
                'guru_id' => $faker->randomElement($guruIds),
                'siswa_id' => $faker->randomElement($siswaIds),
                'tanggal' => $faker->date(),
                'masalah' => $faker->sentence(3),
                'penyebab' => $faker->sentence(4),
                'tindak_lanjut' => $faker->sentence(5),
                'kesimpulan_tindak_lanjut' => $faker->sentence(6),
                'hasil_wawancara' => $faker->paragraph,
            ]);
        }
    }
}
