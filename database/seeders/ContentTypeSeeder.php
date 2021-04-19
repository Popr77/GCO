<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('content_types')->insert([
            'name' => 'link',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('content_types')->insert([
        'name' => 'text',
        'created_at' => now(),
        'updated_at' => now()
        ]);

        DB::table('content_types')->insert([
        'name' => 'img',
        'created_at' => now(),
        'updated_at' => now()
        ]);
    }
}
