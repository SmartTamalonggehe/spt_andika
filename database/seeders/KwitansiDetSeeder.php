<?php

namespace Database\Seeders;

use App\Models\KwitansiDetail;
use Illuminate\Database\Seeder;

class KwitansiDetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/kwitansi-det");
        $data = json_decode($json);
        foreach ($data as $obj) {
            KwitansiDetail::create([
                'id' => $obj->id,
                'kwitansi_id' => $obj->kwitansi_id,
                'uraian' => $obj->uraian,
                'lama' => $obj->lama,
                'jumlah' => $obj->jumlah,
            ]);
        }
    }
}
