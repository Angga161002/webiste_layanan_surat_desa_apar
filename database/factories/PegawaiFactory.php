<?php

namespace Database\Factories;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    protected $model = Pegawai::class;

    public function definition()
    {
        return [
            'username' => $this->faker->name,
            'email' => $this->faker->email,
            'no_hp' => $this->faker->phoneNumber(),
            'password' => Hash::make('123456'),
        ];
    }
}
