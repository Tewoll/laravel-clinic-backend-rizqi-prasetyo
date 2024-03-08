<?php

namespace Database\Factories;

use App\Models\ProfileClinic;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileClinicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProfileClinic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'doctor_name' => $this->faker->name,
            'unique_code' => $this->faker->unique()->randomNumber(),
        ];
    }
}
