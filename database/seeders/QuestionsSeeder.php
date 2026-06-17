<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Questions;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Questions::factory()->insert([
            "id_questionnaire" => 1,
            "titre_question" => "Comment s’est passé ton réveil ce matin ?",
            "categorie" => "L'énergie au quotidien et vitalité",
            "ordre" => 1
        ]);
    }
}
