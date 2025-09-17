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

        for ($i = 1; $i <= 5; $i++) {
            Siswa::create([
                'nis' => $faker->unique()->numerify('2025###'),
                'nama_siswa' => $faker->name,
                'tingkat' => 'X',
                'jurusan' => 'RPL-1',
                'alamat_rumah' => $faker->address,
                'no_hp' => $faker->phoneNumber,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '-15 years'),
            ]);
        }
    }
}
