<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Seeder;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents("https://andika.tauogp.my.id/api/surat");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Surat::create([
                'id' => $obj->id,
                'pegawai_id' => $obj->pegawai_id,
                'tgl_surat' => $obj->tgl_surat,
                'no_surat' => $obj->no_surat,
                'jenis_surat' => $obj->jenis_surat,
                'dasar' => $obj->dasar,
                'dari' => $obj->dari,
                'tujuan' => $obj->tujuan,
                'maksud' => $obj->maksud,
                'alat_angkut' => $obj->alat_angkut,
                'lama' => $obj->lama,
                'tgl_berangkat' => $obj->tgl_berangkat,
                'tgl_kembali' => $obj->tgl_kembali,
                'beban_anggaran' => $obj->beban_anggaran,
                'mata_anggaran' => $obj->mata_anggaran,
                'keterangan' => $obj->keterangan,
            ]);
        }
    }
}
