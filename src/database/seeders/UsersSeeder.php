<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                "name" => "Administrador",
                "email" => "admin@gmail.com",
                "password" => bcrypt("123456"),
                'remember_token' => Str::random(10)
            ]
        );
    }
}
