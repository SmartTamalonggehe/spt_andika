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
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin');

        $ketua = User::create([
            'name' => 'Ketua',
            'email' => 'ketua@mail.com',
            'password' => Hash::make('ketua123'),
        ]);
        $ketua->assignRole('ketua');
    }
}
