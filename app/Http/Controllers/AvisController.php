<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;

class AvisController extends Controller
{
    public function index()
    {
        $avis = Avis::with('utilisateur')
            ->latest()
            ->get();

        return view('avis', [
            'avis' => $avis
        ]);
    }

    public function ajouter(Request $request)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
            'commentaire' => 'nullable|string',
        ]);

        Avis::create([
            'utilisateur_id' => auth()->user()->id_utilisateur,
            'note' => $request->note,
            'commentaire' => $request->commentaire,
        ]);

        return redirect('/avis');
    }
}