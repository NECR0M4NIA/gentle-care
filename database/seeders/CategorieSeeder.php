<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categorie::factory()->insert([
            "id_categorie" => 1,
            "nom_categorie" => "L'énergie au quotidien et vitalité ⚡",
        ]);

        Categorie::factory()->insert([
            "id_categorie" => 2,
            "nom_categorie" => "Le rythme de vie et équilibre 🎐",
        ]);

        Categorie::factory()->insert([
            "id_categorie" => 3,
            "nom_categorie" => "Entourage et Relations ❤️",
        ]);

        Categorie::factory()->insert([
            "id_categorie" => 4,
            "nom_categorie" => "La météo émotionnelle 🌡️",
        ]);
    }
}
