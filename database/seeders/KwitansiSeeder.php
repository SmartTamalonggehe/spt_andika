<?php

namespace Database\Seeders;

use App\Models\Kwitansi;
use Illuminate\Database\Seeder;

class KwitansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/kwitansi");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Kwitansi::create([
                'id' => $obj->id,
                'surat_id' => $obj->surat_id,
                'kode_rek' => $obj->kode_rek,
                'tgl_kwitansi' => $obj->tgl_kwitansi,
                'jumlah_ditetapkan' => $obj->jumlah_ditetapkan,
                'terima' => $obj->terima,
                'tgl_terima' => $obj->tgl_terima,
                'jumlah_terima' => $obj->jumlah_terima,
                'pergi' => $obj->pergi,
                'pulang' => $obj->pulang,
            ]);
        }
    }
}
