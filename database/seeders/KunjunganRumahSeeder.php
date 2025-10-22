<?php

namespace Database\Seeders;

use App\Models\BukuTamu;
use Illuminate\Database\Seeder;
use App\Models\KunjunganRumah;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Ortu;
use Faker\Factory as Faker;

class KunjunganRumahSeeder extends Seeder
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
        $bukutamuIds = BukuTamu::pluck('id')->toArray();

        for ($i = 1; $i <= 5; $i++) {
            KunjunganRumah::create([
                'guru_id' => $faker->randomElement($guruIds),
                'siswa_id' => $faker->randomElement($siswaIds),
                'alamat_id' => $faker->randomElement($bukutamuIds),
                'tanggal' => $faker->date(),
                'tujuan' => $faker->sentence(3),
                'hasil_wawancara' => $faker->paragraph,
                'kesimpulan_tindak_lanjut' => $faker->sentence(6),
                'ttd_path' => 'signature.png',
            ]);
        }
    }
}
