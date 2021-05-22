<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t_lessons = Lesson::all()->count();

        foreach (range(1, $t_lessons) as $i) {
            foreach (range(1, 10) as $i2) {

                DB::table('questions')->insert([
                    'question' => 'Question ' . $i2,
                    'lesson_id' => $i
                ]);
            }
        }
    }
}
