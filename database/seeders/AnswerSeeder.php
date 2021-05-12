<?php

namespace Database\Seeders;

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
        DB::table('answers')->insert([
            'answer' => 'Answer 1.A',
            'question_id' => 1,
            'is_correct' => '1'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 1.B',
            'question_id' => 1,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 1.C',
            'question_id' => 1,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 1.D',
            'question_id' => 1,
            'is_correct' => '0'
        ]);
//        DB::table('answers')->insert([
//            'answer' => 'Answer E',
//            'question_id' => 1,
//            'lessson_id' => 2
//        ]);

        DB::table('answers')->insert([
            'answer' => 'Answer 2.A',
            'question_id' => 2,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 2.B',
            'question_id' => 2,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 2.C',
            'question_id' => 2,
            'is_correct' => '1'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 2.D',
            'question_id' => 2,
            'is_correct' => '0'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 3.A',
            'question_id' => 3,
            'is_correct' => '1'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 3.B',
            'question_id' => 3,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 3.C',
            'question_id' => 3,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 3.D',
            'question_id' => 3,
            'is_correct' => '0'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 4.A',
            'question_id' => 4,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 4.B',
            'question_id' => 4,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 4.C',
            'question_id' => 4,
            'is_correct' => '1'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 4.D',
            'question_id' => 4,
            'is_correct' => '0'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 5.A',
            'question_id' => 5,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 5.B',
            'question_id' => 5,
            'is_correct' => '1'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 5.C',
            'question_id' => 5,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 5.D',
            'question_id' => 5,
            'is_correct' => '0'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 6.A',
            'question_id' => 6,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 6.B',
            'question_id' => 6,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 6.C',
            'question_id' => 6,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 6.D',
            'question_id' => 6,
            'is_correct' => '1'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 7.A',
            'question_id' => 7,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 7.B',
            'question_id' => 7,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 7.C',
            'question_id' => 7,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 7.D',
            'question_id' => 7,
            'is_correct' => '1'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 8.A',
            'question_id' => 8,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 8.B',
            'question_id' => 8,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 8.C',
            'question_id' => 8,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 8.D',
            'question_id' => 8,
            'is_correct' => '1'
        ]);


        DB::table('answers')->insert([
            'answer' => 'Answer 9.A',
            'question_id' => 9,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 9.B',
            'question_id' => 9,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 9.C',
            'question_id' => 9,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 9.D',
            'question_id' => 9,
            'is_correct' => '1'
        ]);




//        licao 1

        DB::table('answers')->insert([
            'answer' => 'Answer 1.A',
            'question_id' => 10,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 1.B',
            'question_id' => 10,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 1.C',
            'question_id' => 10,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 1.D',
            'question_id' => 10,
            'is_correct' => '1'
        ]);

        DB::table('answers')->insert([
            'answer' => 'Answer 2.A',
            'question_id' => 11,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 2.B',
            'question_id' => 11,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 2.C',
            'question_id' => 11,
            'is_correct' => '0'
        ]);
        DB::table('answers')->insert([
            'answer' => 'Answer 2.D',
            'question_id' => 11,
            'is_correct' => '1'
        ]);

    }
}
