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
            'address' => 'Rua das Belas',
            'postal_code' => '2350-232',
            'city' => 'Porto',
            'phone' => '254362854',
            'nif' => 105204132,
            'photo' => 'placeholder.png'
        ]);

        DB::table('users')->insert([
            'email' => 'joao@atec.pt',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'user_type_id' => 1,
            'remember_token' => Str::random(10)
        ]);

        DB::table('user_data')->insert([
            'user_id' => 2,
            'name' => 'Joao',
            'address' => 'Rua cantos',
            'postal_code' => '4250-000',
            'city' => 'gaia',
            'phone' => '121363545',
            'nif' => 254635236,
            'photo' => 'placeholder.png'
        ]);

        DB::table('users')->insert([
            'email' => 'rui@rui.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'user_type_id' => 2,
            'remember_token' => Str::random(10)
        ]);

        DB::table('user_data')->insert([
            'user_id' => 3,
            'name' => 'Rui',
            'address' => 'Rua cantos',
            'postal_code' => '4250-000',
            'city' => 'gaia',
            'phone' => '121333545',
            'nif' => 253635236,
            'photo' => 'placeholder.png'
        ]);

    }
}
