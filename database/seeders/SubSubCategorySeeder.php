<?php

namespace Database\Seeders;

use App\Models\SubCategory;
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
        $subCategories = SubCategory::all();
        foreach ($subCategories as $subCategory){
            for ($i=0; $i<2; $i++){
                DB::table('sub_sub_categories')->insert([
                    'sub_category_id' => $subCategory->id,
                    'name' => \Faker\Factory::create()->name(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}
