<?php

namespace Database\Seeders;

use App\Models\SubSubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubSubCategory::factory(40)->create();
    }
}
