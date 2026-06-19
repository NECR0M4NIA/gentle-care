<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Services\YoutubeService;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $dernierResultat = Resultat::where('id_utilisateur', Auth::id())
            ->latest()
            ->first();

        $youtube = new YoutubeService();

        if (!$dernierResultat) {
            $videos = $youtube->search('bien-être relaxation meditation', 9);
        } elseif ($dernierResultat->score_total <= 40) {
            $videos = $youtube->search('exercice respiration guidée stress', 9);
        } else {    
            $videos = $youtube->search('méditation apaisante anxiété soutien', 9);
        }
        

        return view('videos', compact('videos'));
    }
}