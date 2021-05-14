<?php

namespace Database\Seeders;

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
        DB::table('questions')->insert([
            'question' => 'Question 1',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 2',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 3',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 4',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 5',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 6',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 7',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 8',
            'lesson_id' => 2
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 9',
            'lesson_id' => 2
        ]);

        DB::table('questions')->insert([
            'question' => 'Question 1',
            'lesson_id' => 1
        ]);
        DB::table('questions')->insert([
            'question' => 'Question 2',
            'lesson_id' => 1
        ]);
    }
}
