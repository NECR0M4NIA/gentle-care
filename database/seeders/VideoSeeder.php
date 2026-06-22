<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Video::insert([
            // Score 0-20 🟢
            ['titre' => 'Accepte la solitude comme meilleur ami',                   'url' => 'https://youtu.be/rOoO3uAa_So?si=mV5u9U0I40SLgW3b',                   'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Méditation pour cultiver la gratitude',                    'url' => 'https://www.youtube.com/watch?v=U9YKY7fdwyg',    'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Pleine conscience - méditation guidée 10 minutes',         'url' => 'https://www.youtube.com/watch?v=O-6f5wQXSu8',    'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Étirements doux du matin pour se réveiller en forme',      'url' => 'https://www.youtube.com/watch?v=g_tea8ZNk5A',    'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Relaxation guidée pour entretenir sa bonne énergie',       'url' => 'https://www.youtube.com/watch?v=inpok4MKVLM',    'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Yoga du soir pour bien terminer sa journée',               'url' => 'https://www.youtube.com/watch?v=v7AYKMP6rOE',    'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],

            // Score 21-40 🟡
            ['titre' => 'Exercice de respiration anti-stress 5 minutes',            'url' => 'https://www.youtube.com/watch?v=tybOi4hjZFQ',    'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Cohérence cardiaque 5 minutes - méthode 365',              'url' => 'https://www.youtube.com/watch?v=FNkNFMqbMa8',    'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Méditation pour réduire le stress et l\'anxiété',          'url' => 'https://www.youtube.com/watch?v=z6X5oEIg6Ak',    'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Yoga pour gérer le stress - 15 minutes',                   'url' => 'https://www.youtube.com/watch?v=hJbRpHZr_d0',    'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Sophrologie express contre la fatigue',                    'url' => 'https://www.youtube.com/watch?v=MIr3RsUWrdo',    'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Technique de relaxation musculaire progressive',           'url' => 'https://www.youtube.com/watch?v=1nZEdqcGpzo',    'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],

            // Score 41-60 🔴
            ['titre' => 'Méditation profonde pour apaiser l\'anxiété',              'url' => 'https://www.youtube.com/watch?v=O-6f5wQXSu8',    'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Sophrologie pour retrouver le calme intérieur',            'url' => 'https://www.youtube.com/watch?v=1ZYbU82GVz4',    'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Respiration 4-7-8 pour calmer une crise d\'angoisse',      'url' => 'https://www.youtube.com/watch?v=YRPh_GaiL8s',    'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Yoga nidra - relaxation profonde guidée',                  'url' => 'https://www.youtube.com/watch?v=M0u9GST_j_g',    'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Méditation bienveillante pour se sentir moins seul(e)',    'url' => 'https://www.youtube.com/watch?v=F6eFFCi12v8',    'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Hypnose douce pour relâcher les tensions et l\'anxiété',   'url' => 'https://www.youtube.com/watch?v=lFcSrYw15V0',    'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
