<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
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
            'Bio' => $this->faker->realText(30),
            'profile' =>'https://i.pravatar.cc/150?u='.$this->faker->uuid(),
            'link' => [
                    0 => [
                        'icon' => base_path(), 
                        'link' => $this->faker->url(), 
                        'label' => $this->faker->catchPhrase 
                    ]
                ] 
        ];
    }
}
