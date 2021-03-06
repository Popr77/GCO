<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use App\Models\ExamGrade;
use App\Models\LessonGrade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(SubSubCategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(ContentTypeSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AnswerSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(ContentSeeder::class);
        $this->call(LessonGradeSeeder::class);
        $this->call(ExamGradeSeeder::class);
    }
}
