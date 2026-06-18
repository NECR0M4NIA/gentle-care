<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();

        return view('dashboard', compact('users'));
    }

    public function destroy(User $user)
    {
        // if (auth()->id() === $user->id) {
        //     return redirect()->back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte !');
        // }

        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}
