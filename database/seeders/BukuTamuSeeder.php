<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BukuTamu;
use App\Models\Siswa;
use App\Models\User;
use Faker\Factory as Faker;

class BukuTamuSeeder extends Seeder
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

        for ($i = 1; $i <= 15; $i++) {
            BukuTamu::create([
                'tanggal' => $faker->date(),
                'guru_id' => $faker->randomElement($guruIds),
                'siswa_id' => $faker->randomElement($siswaIds),
                'nama_tamu' => $faker->name,
                'no_telp' => $faker->phoneNumber,
                'alamat' => $faker->address,
                'keperluan' => $faker->sentence(3),
                'tindak_lanjut' => $faker->sentence(6),
                'ttd_path' => 'signature.png',
            ]);
        }
    }
}
