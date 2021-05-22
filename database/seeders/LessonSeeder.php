<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $t_courses = Course::all()->count();
        $t_modules = $t_courses*5;

        foreach (range(1, $t_modules) as $i){
            $lesson_number = 1;

            $t = rand(1,4);
            foreach (range(1, $t) as $i2) {
                DB::table('lessons')->insert([
                    'title' => \Faker\Factory::create()->firstName,
                    'lesson_number' => $lesson_number,
                    'module_id' => $i
                ]);

                $lesson_number++;
            }

        }
    }
}
