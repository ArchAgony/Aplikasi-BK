<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ortu;
use Faker\Factory as Faker;

class OrtuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            Ortu::create([
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),
                'pekerjaan_ayah' => $faker->jobTitle,
                'pekerjaan_ibu' => $faker->jobTitle,
                'alamat_rumah' => $faker->address,
            ]);
        }
    }
}
