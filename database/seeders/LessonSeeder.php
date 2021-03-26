<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Lesson::factory(10)->create();
    }
}
