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
            'cover' => 'https://i.pravatar.cc/300?u='.$this->faker->uuid(),
            'image' => 'https://i.pravatar.cc/300?u='.$this->faker->uuid(),
            'video' => 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4',
            'privacy' => 'public'
        ];
    }
}
