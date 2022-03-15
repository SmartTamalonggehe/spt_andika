<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'NIP' => $this->faker->unique()->numberBetween(10000, 99999),
            'nama' => $this->faker->name(),
            'bidang' => $this->faker->catchPhrase(),
            'bagian' => $this->faker->bs(),
            'pangkat' => $this->faker->company(),
            'golongan' => $this->faker->randomElement(['IA', 'IB', 'IIC', 'IID', 'IIIA', 'IIIC', 'IVB', 'IVE', 'IVD']),
            'jabatan' => $this->faker->companySuffix(),
            'instansi' => $this->faker->jobTitle(),
            'tingkat' => $this->faker->city(),
        ];
    }
}
