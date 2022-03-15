<?php

namespace Database\Factories;

use App\Models\Surat;
use Illuminate\Database\Eloquent\Factories\Factory;

class KwitansiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'surat_id' => Surat::inRandomOrder()->first(),
            'kode_rek' => $this->faker->numerify(),
            'tgl_kwitansi' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'jumlah_ditetapkan' => $this->faker->numberBetween(10000000, 999999999),
            'terima' => $this->faker->company(),
            'tgl_terima' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'jumlah_terima' => $this->faker->numberBetween(100000, 999999999),
            'pergi' => $this->faker->numberBetween(1000000, 999999999),
            'pulang' => $this->faker->numberBetween(100000, 999999999),
        ];
    }
}
