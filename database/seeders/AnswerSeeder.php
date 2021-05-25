<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t_questions = Question::all()->count();
        $t = 0;

        foreach (range(1, $t_questions) as $i) {
            $correct = rand(1,4);
            if (($i-1)%10 == 0 && $i-1>0)
                $t += 10;

            foreach (range(1, 4) as $i2) {
                $correct == $i2 ? $is_correct = 1 : $is_correct = 0;

                DB::table('answers')->insert([
                    'answer' => 'Answer ' . ($i-$t) . '.' . $i2,
                    'question_id' => $i,
                    'is_correct' => $is_correct
                ]);
            }
        }

    }
}
