<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->company(),
            'course_id' => $this->faker->numberBetween(1, 10),
            'summary' => $this->faker->text(100),
            'cover' => '',
            'image' => '',
            'video' => '',
            'privacy' => 'public'
        ];
    }
}
