<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Question n°1 du questionnaire (Catégorie 1)
        Question::factory()->insert([
            "id_question" => 1,
            "titre_question" => "Comment s’est passé ton réveil ce matin ?",
            "ordre" => 1,
            "id_questionnaire" => 1,
            "id_categorie" => 1,
        ]);

        // Question n°2 du questionnaire (Catégorie 1)
        Question::factory()->insert([
            "id_question" => 2,
            "titre_question" => "Globalement, comment tu évalues ton niveau d'énergie ces derniers jours ?",
            "ordre" => 2,
            "id_questionnaire" => 1,
            "id_categorie" => 1,
        ]);

        // Question n°1 du questionnaire (Catégorie 2)
        Question::factory()->insert([
            "id_question" => 3,
            "titre_question" => "As-tu réussi à prendre du temps pour tes passions ou tes loisirs cette semaine ?",
            "ordre" => 3,
            "id_questionnaire" => 1,
            "id_categorie" => 2,
        ]);
    }
}
