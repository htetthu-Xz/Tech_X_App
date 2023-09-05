<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->company();
        return [
            'title' => $title,
            'slug' => $title
        ];
    }
}
