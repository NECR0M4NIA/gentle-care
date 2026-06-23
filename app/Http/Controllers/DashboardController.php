<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reponse;
use App\Models\Resultat;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user  = Auth::user();
        $users = User::all();

        $hasCompletedQuestionnaire = Reponse::where('id_utilisateur', $user->id_utilisateur)->exists();

        $resultats = Resultat::where('id_utilisateur', $user->id_utilisateur)
            ->orderBy('date_resultat')
            ->get(['date_resultat', 'score_total']);

        $labels = $resultats->pluck('date_resultat');
        $scores = $resultats->pluck('score_total');

        // Compte le nombre de fois dans chaque zone
        $countVert  = $resultats->where('score_total', '<=', 20)->count();
        $countJaune = $resultats->whereBetween('score_total', [21, 40])->count();
        $countRouge = $resultats->where('score_total', '>=', 41)->count();

        return view('dashboard', compact('users', 'hasCompletedQuestionnaire', 'labels', 'scores', 'countVert', 'countJaune', 'countRouge'));
    }
}
