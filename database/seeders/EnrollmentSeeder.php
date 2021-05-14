<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('enrollments')->insert([
            'user_id' => 2,
            'course_id' => 1,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);
        DB::table('enrollments')->insert([
            'user_id' => 2,
            'course_id' => 2,
            'date' => now()->toDateTimeString(),
            'payment_status' => 0,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);
    }
}
