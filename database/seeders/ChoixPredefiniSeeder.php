<?php

namespace Database\Seeders;

use App\Models\ChoixPredefini;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoixPredefiniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ChoixPredefini::factory()->insert([
            "id_question" => 1,
            "titre_choix" => fake()->sentence(3),
            "valeur_score" => fake()->numberBetween(1, 15)
        ]);
    }
}
