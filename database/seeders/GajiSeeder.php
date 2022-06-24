<?php

namespace Database\Seeders;

use App\Models\Gaji;
use Illuminate\Database\Seeder;

class GajiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/gaji");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Gaji::create([
                'id' => $obj->id,
                'pegawai_id' => $obj->pegawai_id,
                'gaji_pokok' => $obj->gaji_pokok,
                'pembulatan' => $obj->pembulatan,
                'tgl_gaji' => $obj->tgl_gaji,
            ]);
        }
    }
}
