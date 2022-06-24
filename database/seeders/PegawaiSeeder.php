<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/pegawai");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Pegawai::create([
                'id' => $obj->id,
                'NIP' => $obj->NIP,
                'nama' => $obj->nama,
                'bidang' => $obj->bidang,
                'bagian' => $obj->bagian,
                'pangkat' => $obj->pangkat,
                'golongan' => $obj->golongan,
                'jabatan' => $obj->jabatan,
                'instansi' => $obj->instansi,
                'tingkat' => $obj->tingkat,
            ]);
        }
    }
}
