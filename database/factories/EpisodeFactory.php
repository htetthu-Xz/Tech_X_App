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
            'cover' => 'https://picsum.photos/1200/770?random='.rand(1,100),
            'image' => 'https://i.pravatar.cc/300?u='.$this->faker->uuid(),
            'video' => '//vjs.zencdn.net/v/oceans.mp4',
            'privacy' => 'public'
        ];
    }
}
