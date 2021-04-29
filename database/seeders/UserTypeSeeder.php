<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'description' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('user_types')->insert([
            'description' => 'normal',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
