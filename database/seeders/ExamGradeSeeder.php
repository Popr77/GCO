<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\ExamGrade;
use App\Models\Lesson;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\Collection;

class ExamGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enrollments = Enrollment::where('user_id', 3)->get();

        $array = [];
        $array2 = [];
        foreach ($enrollments as $enrollment) {
            $totalLessons = 0;
            foreach ($enrollment->course->modules as $module) {
                $totalLessons += Lesson::where('module_id', $module->id)->count();
            }

            $totalGrades = 0;
            foreach ($enrollment->grades as $lesson) {
                if (count(collect($lesson->pivot->grade)) > 0) {
                    if ($lesson->pivot->grade >= 50) {
                        $totalGrades++;
                    }
                }
            }
            if ($totalGrades == $totalLessons){
                array_push($array,$enrollment);
            }
        }
        $array2 = collect($array)->take(2);
        foreach ($array2 as $item){
            $examGrade = new ExamGrade();
            $examGrade->enrollment_id = $item->id;
            $examGrade->grade = rand(51,99);
            $examGrade->created_at = now();
            $examGrade->save();
        }

    }
}
