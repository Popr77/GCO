<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'goals' => $this->faker->text(),
            'requirements' => $this->faker->text(),
            'status' => 1,
            'duration' => $this->faker->randomElement([15, 30, 60]),
            'price' => $this->faker->randomNumber(4, true),
            'sub_sub_category_id' => SubSubCategory::select('id')->inRandomOrder()->first(),
            'photo' => 'placeholder.png',
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
