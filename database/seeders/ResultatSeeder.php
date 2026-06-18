<?php

namespace Database\Seeders;

use App\Models\Resultat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resultat::factory()->insert([
            "id_resultat" => 1,
            "score_total" => 34,
            "date_resultat" => "2026-06-18",
            "id_utilisateur" => 1
        ]);
    }
}
