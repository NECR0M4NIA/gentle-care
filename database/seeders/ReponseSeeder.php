<?php

namespace Database\Seeders;

use App\Models\Reponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reponse::factory()->insert([
            "id_reponse" => 1,
            "id_utilisateur" => 1,
            "id_question" => 1,
            "id_choix" => 3
        ]);
    }
}
