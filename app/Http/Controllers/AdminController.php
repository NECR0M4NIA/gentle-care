<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resultat;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();

        $resultats = Resultat::where('id_utilisateur', Auth::id())
            ->orderBy('date_resultat')
            ->get(['date_resultat', 'score_total']);

        $labels = $resultats->pluck('date_resultat');
        $scores = $resultats->pluck('score_total');

        return view('dashboard', compact('users', 'labels', 'scores'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}