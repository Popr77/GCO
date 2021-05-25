<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
////        $module_id = rand(1,20);
////        $lesson_number = Lesson::
////        where('module_id', $module_id)
////            ->count();
////
////        $lesson_number++;
////
//        $modules = Module::ALl();
//        foreach ($modules as $module){
//            for($i=1; $i<=4; $i++){
////                if ($i>1)
//                    dd($i);
//                return [
//                    'title' => $this->faker->firstName,
//                    'lesson_number' => $i,
//                    'module_id' => $module->id
//                ];
//            }
//
//        }
//
        return [
            'title' => $this->faker->firstName,
            'lesson_number' => rand(1,20),
        ];
    }
}
