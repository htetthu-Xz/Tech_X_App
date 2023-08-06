<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Admin::factory(15)->create();
        \App\Models\Instructor::factory(15)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Category::factory(15)->create();
        \App\Models\Courses::factory(10)->create()->each(function($course) {
            \App\Models\CategoryCourse::create([
                'courses_id' => $course->id,
                'category_id' => rand(1, 15)
            ]);
        });

        $this->call([
            PermissionSeeder::class,
            SuperAdminSeeder::class
        ]);
    }
}
