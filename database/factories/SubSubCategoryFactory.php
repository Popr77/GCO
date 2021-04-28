<?php

namespace Database\Factories;

use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubSubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubSubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sub_category_id' => SubCategory::select('id')->inRandomOrder()->first(),
            'name' => $this->faker->name(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
