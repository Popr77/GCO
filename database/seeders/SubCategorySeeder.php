<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        foreach ($categories as $category){
            for ($i=0; $i<2; $i++) {
                DB::table('sub_categories')->insert([
                    'category_id' => $category->id,
                    'name' => \Faker\Factory::create()->name(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
