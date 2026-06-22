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
            ['titre' => 'Méditation du matin',  'url' => 'https://www.youtube.com/watch?v=7XhfOYF1-i4', 'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Yoga douceur',         'url' => 'https://www.youtube.com/watch?v=dtpCwwISnBI&t=18s', 'score_min' => 0,  'score_max' => 20, 'created_at' => now(), 'updated_at' => now()],

            // Score 21-40 🟡
            ['titre' => 'Respiration anti-stress',       'url' => 'https://www.youtube.com/watch?v=XXXXXX', 'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Exercice de cohérence cardiaque', 'url' => 'https://www.youtube.com/watch?v=XXXXXX', 'score_min' => 21, 'score_max' => 40, 'created_at' => now(), 'updated_at' => now()],

            // Score 41-60 🔴
            ['titre' => 'Méditation apaisante anxiété',  'url' => 'https://www.youtube.com/watch?v=XXXXXX', 'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['titre' => 'Sophrologie pour se détendre',  'url' => 'https://www.youtube.com/watch?v=XXXXXX', 'score_min' => 41, 'score_max' => 60, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
