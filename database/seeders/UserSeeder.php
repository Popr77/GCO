<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gco.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'user_type_id' => 1,
            'remember_token' => Str::random(10)
        ]);

        DB::table('user_data')->insert([
            'user_id' => 1,
            'name' => 'admin',
            'address' => '',
            'postal_code' => '',
            'city' => '',
            'phone' => '',
            'nif' => 0,
            'photo' => 'logo.jpg'
        ]);

        DB::table('users')->insert([
            'email' => 'joao@atec.pt',
            'email_verified_at' => now(),
            'password' => '$2y$10$P/eDZMvAYMiasK86Od8pg.iZL7jHZ3qCKD3QH/d.GLo3QUhXUjOvm', // password
            'user_type_id' => 1,
            'remember_token' => Str::random(10)
        ]);

        DB::table('user_data')->insert([
            'user_id' => 2,
            'name' => 'Joao',
            'address' => 'Rua cantos',
            'postal_code' => '4250-000',
            'city' => 'gaoa',
            'phone' => '123456789',
            'nif' => 123456789,
            'photo' => 'logo.jpg'
        ]);

    }
}
