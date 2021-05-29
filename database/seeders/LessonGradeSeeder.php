<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\LessonGrade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class LessonGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $enrollments = Enrollment::where('user_id', 1)->get();

        foreach ($enrollments as $enrollment){
            foreach ($enrollment->course->modules as $module){
                foreach ($module->lessons as $lesson){

                    $lessonGrade = new LessonGrade();
                    $lessonGrade->lesson_id = $lesson->id;
                    $lessonGrade->enrollment_id = $enrollment->id;
                    $lessonGrade->grade = rand(50, 100);
                    $lessonGrade->save();
                }
            }
        }

        $enrollments = Enrollment::where('user_id', 2)->get();

        foreach ($enrollments as $enrollment){
            foreach ($enrollment->course->modules as $module){
                foreach ($module->lessons as $lesson){

                    $lessonGrade = new LessonGrade();
                    $lessonGrade->lesson_id = $lesson->id;
                    $lessonGrade->enrollment_id = $enrollment->id;
                    $lessonGrade->grade = rand(50, 100);
                    $lessonGrade->save();

                }
            }
        }

    }
}
