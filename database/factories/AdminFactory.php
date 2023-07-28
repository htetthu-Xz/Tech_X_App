<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->e164PhoneNumber(),
            'password' => $this->faker->md5(),
            'address' => $this->faker->address(),
            'Dob' => $this->faker->date(),
            'gender' =>$this->faker->randomElement(['male', 'female','other']),
            'profile' =>'https://i.pravatar.cc/150?u='.$this->faker->uuid(),
        ];
    }
}
