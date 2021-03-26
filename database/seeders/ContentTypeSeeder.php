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
            'name' => 'link'
        ]);

        DB::table('content_types')->insert([
        'name' => 'text'
        ]);

        DB::table('content_types')->insert([
        'name' => 'img'
        ]);
    }
}
