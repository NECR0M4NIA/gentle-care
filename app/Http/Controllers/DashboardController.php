<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        $user = Auth::user();
        $hasCompletedQuestionnaire = Reponse::where('id_utilisateur', $user->id_utilisateur)->exists();

        return view('dashboard', compact('users', 'hasCompletedQuestionnaire'));
    }
}