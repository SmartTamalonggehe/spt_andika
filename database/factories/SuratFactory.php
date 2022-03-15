<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pegawai_id' => Pegawai::inRandomOrder()->first(),
            'tgl_surat' => $this->faker->dateTime(),
            'no_surat' => $this->faker->randomNumber(5, true),
            'jenis_surat' => $this->faker->randomElement(['SPT', 'SPPD']),
            'dasar' => $this->faker->bs(),
            'dari' => $this->faker->city(),
            'tujuan' => $this->faker->city(),
            'maksud' => $this->faker->name(),
            'alat_angkut' => $this->faker->randomElement(['Pesawat', 'Kapal', 'Kendaraan']),
            'lama' => $this->faker->randomDigitNotNull(),
            'tgl_berangkat' => $this->faker->dateTime(),
            'tgl_kembali' => $this->faker->dateTime(),
            'beban_anggaran' => $this->faker->name(),
            'mata_anggaran' => $this->faker->name(),
            'keterangan' => $this->faker->name(),
        ];
    }
}
