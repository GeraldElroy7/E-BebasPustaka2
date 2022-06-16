<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Hash;

class MahasiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mahasiswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = Faker::create('en_US');

        return [
            'nrp' => $this->faker->numerify('0#111#40000###'),
            'email' => $this->faker->unique()->safeEmail(),
            'nama' => $this->faker->name(),
            'telp' => $this->faker->phoneNumber(),
            'jenjang' => $this->faker->randomElement(['D3','D4','S1', 'S2', 'S3', 'Profesi']),
            'fakultas' => $random->company(),
            'departemen' => $random->bs(),
            'judulTA' => $this->faker->sentence(),
            'mengajukan' => true,
            'password' => Hash::make('12345')
        ];
    }
}
