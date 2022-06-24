<?php

namespace Database\Seeders;

use App\Models\Pengikut;
use Illuminate\Database\Seeder;

class PengikutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/pengikut");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Pengikut::create([
                'id' => $obj->id,
                'surat_id' => $obj->surat_id,
                'pegawai_id' => $obj->pegawai_id,
            ]);
        }
    }
}
