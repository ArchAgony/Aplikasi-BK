<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama_guru' => 'Guru BK Utama',
            'nip' => '12345',
            'email' => 'guru@example.com',
            'password' => 'guru123',
        ]);
    }
}
