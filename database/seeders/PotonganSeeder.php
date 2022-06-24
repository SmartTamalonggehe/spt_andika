<?php

namespace Database\Seeders;

use App\Models\Potongan;
use Illuminate\Database\Seeder;

class PotonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/potongan");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Potongan::create([
                'id' => $obj->id,
                'gaji_id' => $obj->gaji_id,
                'nm_potongan' => $obj->nm_potongan,
                'jml_potongan' => $obj->jml_potongan,
            ]);
        }
    }
}
