<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Creates 5 modules for each course
         */
        Course::factory(20)->create()->each(function ($course) {
            $course->modules()->saveMany(Module::factory(5)->make());
        });
    }
}
