<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Enlevez le commentaire juste en bas si vous avez fait un migrate:fresh juste avant et remettez le en commentaire
        User::factory(24)->create();

        $this->call([
            CategorieSeeder::class,
            QuestionnaireSeeder::class,
            QuestionsSeeder::class,
            ChoixSeeder::class,
            ReponseSeeder::class,
            ResultatSeeder::class,
        ]);
    }
}
