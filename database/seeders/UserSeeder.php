<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kepegawaian = User::create([
            'name' => 'Kepegawaian',
            'email' => 'kepegawaian@mail.com',
            'password' => Hash::make('kepegawaian123'),
        ]);
        $kepegawaian->assignRole('kepegawaian');

        $keuangan = User::create([
            'name' => 'Keuangan',
            'email' => 'keuangan@mail.com',
            'password' => Hash::make('keuangan123'),
        ]);
        $keuangan->assignRole('keuangan');

        // $pegawai = User::create([
        //     'name' => 'pegawai',
        //     'email' => 'pegawai@mail.com',
        //     'password' => Hash::make('pegawai123'),
        // ]);
        // $pegawai->assignRole('pegawai');

        $ketua = User::create([
            'name' => 'Ketua',
            'email' => 'ketua@mail.com',
            'password' => Hash::make('ketua123'),
        ]);
        $ketua->assignRole('ketua');
    }
}
