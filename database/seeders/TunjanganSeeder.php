<?php

namespace Database\Seeders;

use App\Models\Tunjangan;
use Illuminate\Database\Seeder;

class TunjanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/tunjangan");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Tunjangan::create([
                'id' => $obj->id,
                'gaji_id' => $obj->gaji_id,
                'nm_tunjangan' => $obj->nm_tunjangan,
                'jml_tunjangan' => $obj->jml_tunjangan,
            ]);
        }
    }
}
