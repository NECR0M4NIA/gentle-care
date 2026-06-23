<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $citations = [
            [
                'author' => 'Anonyme',
                'content' => 'C’est totalement normal d’avoir des jours sans. Ne pas être au top aujourd’hui ne définit pas qui tu es.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Morgan Harper Nichols',
                'content' => 'Prends une grande inspiration. Tu as déjà survécu à 100 % des pires journées de ta vie jusqu’ici. Tu t’en sors très bien.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Anonyme',
                'content' => 'Les fleurs ont toutes besoin de temps pour pousser, et toi aussi. Ne te compare pas au rythme des autres.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Charlie Mackesy',
                'content' => '« Quel est le choix le plus courageux que tu aies jamais fait ? » a demandé le garçon. « Demander de l’aide », a répondu le cheval.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Anonyme',
                'content' => 'Ta valeur ne dépend pas de ta productivité. Tu as le droit de juste exister, de te reposer et de respirer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Anonyme',
                'content' => 'Une mauvaise journée n’est pas une mauvaise vie. Demain est une toute nouvelle page, laisse une chance à la suite.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Lao Tseu',
                'content' => 'La nature ne se presse jamais, et pourtant tout est accompli. Donne-toi le temps dont tu as besoin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Anonyme',
                'content' => 'Sois aussi doux et patient avec toi-même que tu le serais avec ton ou ta meilleure amie s’il ou elle n’allait pas bien.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Anonyme',
                'content' => 'Même le plus petit pas en avant reste un pas en avant. L’important n’est pas la vitesse, c’est la direction.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'C.S. Lewis',
                'content' => 'On ne peut pas revenir en arrière pour changer le début, mais on peut commencer là où on est et changer la fin.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Anonyme',
                'content' => 'Rappelle-toi que tu as le droit de ressentir ce que tu ressens. Tes émotions sont légitimes, ne les combat pas, laisse-les passer.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'author' => 'Matt Haig',
                'content' => 'Rien ne dure éternellement, pas même cette tempête dans ta tête. Le ciel finit toujours par s’éclaircir.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('citations')->insert($citations);
    }
}