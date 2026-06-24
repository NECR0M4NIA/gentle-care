<?php

namespace Database\Seeders;

use App\Models\Avis;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvisSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        Avis::create([
            'utilisateur_id' => $users[0]->id_utilisateur,
            'note' => 5,
            'commentaire' => 'Excellent service !',
        ]);

        Avis::create([
            'utilisateur_id' => $users[1]->id_utilisateur,
            'note' => 4,
            'commentaire' => 'Très satisfait.',
        ]);
    }
}
