<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTypeSeeder::class);
        \App\Models\User::factory(10)->create();
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(SubSubCategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(ModuleSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(ContentTypeSeeder::class);

    }
}
