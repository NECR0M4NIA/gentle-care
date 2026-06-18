<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->insert([
            "id_utilisateur" => fake()->randomDigit(),
            "name" => fake()->name(),
            "email" => fake()->email(),
            "email_verified_at" => fake()->date(),
            "password" => fake()->password(),
        ]);
    }
}
