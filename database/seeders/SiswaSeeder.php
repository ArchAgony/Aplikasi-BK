<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Ortu;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');
        $kelasIds = Kelas::pluck('id')->toArray();
        $ortuIds = Ortu::pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            Siswa::create([
                'nis' => $faker->unique()->numerify('2025###'),
                'nama_siswa' => $faker->name,
                'kelas_id' => $faker->randomElement($kelasIds),
                'orang_tua_id' => $faker->randomElement($ortuIds),
                'alamat_rumah' => $faker->address,
                'no_hp' => $faker->phoneNumber,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '-15 years'),
            ]);
        }
    }
}
