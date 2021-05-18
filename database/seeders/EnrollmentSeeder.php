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
            'user_id' => 1,
            'course_id' => 1,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);
        DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 2,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 3,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 4,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
            
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 5,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 6,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 7,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 8,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 9,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 10,
            'date' => now()->toDateTimeString(),
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);
    }
}
