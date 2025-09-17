<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kelas')->insert([
            ['tingkat' => 'X', 'jurusan' => 'RPL-1'],
            ['tingkat' => 'XI', 'jurusan' => 'RPL-1'],
            ['tingkat' => 'XII', 'jurusan' => 'TKJ-1'],
            'jurusan' => 'TKJ-2',
            'jurusan' => 'TKJ-3',
            'jurusan' => 'TKJ-4',
            'jurusan' => 'TITL-1',
            'jurusan' => 'TITL-2',
            'jurusan' => 'DKV-1',
            'jurusan' => 'DKV-2',
            'jurusan' => 'DKV-2',
        ]);
    }
}
