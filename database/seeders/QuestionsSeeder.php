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
        Question::insert([
            //!\\ CATEGORIE 1 QUESTIONS //!\\
            ["id_question" => 1, "titre_question" => "Comment s'est passé ton réveil ce matin ?",                                          "ordre" => 1, "id_questionnaire" => 1, "id_categorie" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 2, "titre_question" => "Globalement, comment tu évalues ton niveau d'énergie ces derniers jours ?",          "ordre" => 2, "id_questionnaire" => 1, "id_categorie" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 3, "titre_question" => "Comment qualifierais-tu la qualité de ton sommeil récemment ?",                      "ordre" => 3, "id_questionnaire" => 1, "id_categorie" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 4, "titre_question" => "Face aux tâches de ta journée (cours, devoirs, projets), comment te sens-tu ?",      "ordre" => 4, "id_questionnaire" => 1, "id_categorie" => 1, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 5, "titre_question" => "En fin de journée, dans quel état d'esprit te trouves-tu généralement ?",            "ordre" => 5, "id_questionnaire" => 1, "id_categorie" => 1, "created_at" => now(), "updated_at" => now()],

            //!\\ CATEGORIE 2 QUESTIONS //!\\
            ["id_question" => 6, "titre_question" => "As-tu réussi à prendre du temps pour tes passions ou tes loisirs cette semaine ?",                   "ordre" => 6, "id_questionnaire" => 1, "id_categorie" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 7, "titre_question" => "Comment décrirais-tu ton rythme de vie en ce moment ?",                                              "ordre" => 7, "id_questionnaire" => 1, "id_categorie" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 8, "titre_question" => "Arrives-tu à t'accorder de vrais moments de déconnexion (sans penser aux devoirs ou obligations) ?", "ordre" => 8, "id_questionnaire" => 1, "id_categorie" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 9, "titre_question" => "Comment trouves-tu l'équilibre entre tes obligations (études/travail) et ta vie personnelle ?",      "ordre" => 9, "id_questionnaire" => 1, "id_categorie" => 2, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 10, "titre_question" => "Prends-tu le temps de faire des pauses régulières pendant tes journées ?",                          "ordre" => 10, "id_questionnaire" => 1, "id_categorie" => 2, "created_at" => now(), "updated_at" => now()],

            //!\\ CATEGORIE 3 QUESTIONS //!\\
            ["id_question" => 11, "titre_question" => "Quand tu as envie de parler ou de partager un bon moment, tu as du monde autour de toi ?",       "ordre" => 11, "id_questionnaire" => 1, "id_categorie" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 12, "titre_question" => "Comment te sens-tu dans tes relations actuelles (amis, famille, cours...) ?",                    "ordre" => 12, "id_questionnaire" => 1, "id_categorie" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 13, "titre_question" => "À quelle fréquence partages-tu des moments de rire ou de complicité avec d'autres personnes ?",  "ordre" => 13, "id_questionnaire" => 1, "id_categorie" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 14, "titre_question" => "Quand tu es en groupe (classe, amis), comment te sens-tu généralement ?",                        "ordre" => 14, "id_questionnaire" => 1, "id_categorie" => 3, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 15, "titre_question" => "Sens-tu que tu peux être 100 % toi-même avec les personnes que tu fréquentes le plus ?",         "ordre" => 15, "id_questionnaire" => 1, "id_categorie" => 3, "created_at" => now(), "updated_at" => now()],

            //!\\ CATEGORIE 4 QUESTIONS //!\\
            ["id_question" => 16, "titre_question" => "Si tu devais résumer ton humeur générale de ces derniers jours avec une météo, ce serait...",                          "ordre" => 16, "id_questionnaire" => 1, "id_categorie" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 17, "titre_question" => "Comment réagis-tu face aux petits imprévus ou agacements du quotidien ces derniers temps ?",                           "ordre" => 17, "id_questionnaire" => 1, "id_categorie" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 18, "titre_question" => "À quel point te sens-tu serein(e) face à l'avenir ou aux prochains jours ?",                                           "ordre" => 18, "id_questionnaire" => 1, "id_categorie" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 19, "titre_question" => "Est-ce que tu arrives facilement à ressentir de la joie ou de la gratitude pour les petites choses de la journée ?",   "ordre" => 19, "id_questionnaire" => 1, "id_categorie" => 4, "created_at" => now(), "updated_at" => now()],
            ["id_question" => 20, "titre_question" => "Comment qualifierais-tu ton niveau de confiance en toi en ce moment ?",                                                "ordre" => 20, "id_questionnaire" => 1, "id_categorie" => 4, "created_at" => now(), "updated_at" => now()],
        ]);
    }
}
