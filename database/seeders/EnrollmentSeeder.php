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
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);
        DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 2,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 3,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 4,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"

        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 5,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 6,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 7,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 8,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 9,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);DB::table('enrollments')->insert([
            'user_id' => 1,
            'course_id' => 10,
            'payment_status' => 1,
            'feedback_stars' => 4,
            'feedback_comment' => "valeu!"
        ]);
    }
}
