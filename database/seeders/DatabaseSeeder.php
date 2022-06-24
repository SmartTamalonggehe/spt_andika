<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(SuratSeeder::class);
        $this->call(PengikutSeeder::class);
        $this->call(GajiSeeder::class);
        $this->call(KwitansiSeeder::class);
        $this->call(KwitansiDetSeeder::class);
        $this->call(PotonganSeeder::class);
        $this->call(TunjanganSeeder::class);
    }
}
