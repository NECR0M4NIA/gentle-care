<?php

namespace Database\Seeders;

use App\Models\Choix;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Question 1 (Catégorie 1) => Choix
        Choix::factory()->insert([
            "id_choix" => 1,
            "nom_choix" => "En pleine forme !",
            "valeur_choix" => 0,
            "id_question" => 1,
        ]);

        Choix::factory()->insert([
            "id_choix" => 2,
            "nom_choix" => "Ca va je me suis réveillé tranquillement",
            "valeur_choix" => 1,
            "id_question" => 1,
        ]);

        Choix::factory()->insert([
            "id_choix" => 3,
            "nom_choix" => "Un peu dur, j’ai dû repousser le réveil",
            "valeur_choix" => 2,
            "id_question" => 1,
        ]);

        Choix::factory()->insert([
            "id_choix" => 4,
            "nom_choix" => "Très difficile, je n’avais pas du tout envie de me lever ",
            "valeur_choix" => 3,
            "id_question" => 1,
        ]);

        // Question 2 (Catégorie 1) => Choix
        Choix::factory()->insert([
            "id_choix" => 5,
            "nom_choix" => "Au top, j’ai beaucoup d’énergie !",
            "valeur_choix" => 0,
            "id_question" => 2,
        ]);

        Choix::factory()->insert([
            "id_choix" => 6,
            "nom_choix" => "Correct, je tiens le rythme sans trop de soucis",
            "valeur_choix" => 1,
            "id_question" => 2,
        ]);

        Choix::factory()->insert([
            "id_choix" => 7,
            "nom_choix" => "Un peu bas, je me sens vite fatigué(e)",
            "valeur_choix" => 2,
            "id_question" => 2,
        ]);

        Choix::factory()->insert([
            "id_choix" => 8,
            "nom_choix" => "À plat, je traîne un peu toute la journée",
            "valeur_choix" => 3,
            "id_question" => 2,
        ]);

        // TEST Question 3 (Catégorie 2) => Choix TEST
        Choix::factory()->insert([
            "id_choix" => 9,
            "nom_choix" => "Oui, à fond ! J'ai pris beaucoup de temps pour moi.",
            "valeur_choix" => 0,
            "id_question" => 3,
        ]);

        Choix::factory()->insert([
            "id_choix" => 10,
            "nom_choix" => "Oui, j'ai réussi à me caler quelques moments sympas.",
            "valeur_choix" => 1,
            "id_question" => 3,
        ]);

        Choix::factory()->insert([
            "id_choix" => 11,
            "nom_choix" => "Très peu, mon emploi du temps était trop chargé.",
            "valeur_choix" => 2,
            "id_question" => 3,
        ]);

        Choix::factory()->insert([
            "id_choix" => 12,
            "nom_choix" => "Pas du tout, je n'ai pas eu le temps ou la motivation.",
            "valeur_choix" => 3,
            "id_question" => 3,
        ]);
    }
}
