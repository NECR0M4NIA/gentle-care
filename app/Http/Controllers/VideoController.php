<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function index()
    {
        $dernierResultat = Resultat::where('id_utilisateur', Auth::id())
            ->latest()
            ->first();

        $score = $dernierResultat?->score_total ?? 0;

        $videos = Video::where('score_min', '<=', $score)
            ->where('score_max', '>=', $score)
            ->get();

        return view('videos', compact('videos'));
    }
}