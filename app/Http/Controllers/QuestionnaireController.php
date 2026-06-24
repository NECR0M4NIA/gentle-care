<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Reponse;
use App\Models\Resultat;
use App\Services\YoutubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public function show(int $id_questionnaire, $ordre = 1)
    {
        $question = Question::with(['choix', 'categorie'])
            ->where('id_questionnaire', $id_questionnaire)->where('ordre', $ordre)->firstOrFail();

        $total = Question::where('id_questionnaire', $id_questionnaire)->count();

        return view('questionnaire', compact('question', 'ordre', 'total', 'id_questionnaire'));
    }

    public function store(Request $request, int $id_questionnaire)
    {
        $request->validate([
            'id_question' => 'required|exists:questions,id_question',
            'id_choix'    => 'required|exists:choixes,id_choix',
            'ordre'       => 'required|integer',
        ]);

        Reponse::updateOrCreate(
            [
                'id_utilisateur' => Auth::id(),
                'id_question'    => $request->id_question,
            ],
            [
                'id_choix' => $request->id_choix,
            ]
        );

        $total = Question::where('id_questionnaire', $id_questionnaire)->count();
        $prochainOrdre = $request->ordre + 1;

        if ($prochainOrdre <= $total) {
            return redirect()->route('questionnaire.show', [
                'id_questionnaire' => $id_questionnaire,
                'ordre'            => $prochainOrdre,
            ]);
        }

        return redirect()->route('questionnaire.resultat', $id_questionnaire);
    }

    public function resultat(int $id_questionnaire)
    {
        $ids_questions = Question::where('id_questionnaire', $id_questionnaire)
            ->pluck('id_question');

        $reponses = Reponse::with('choix')
            ->where('id_utilisateur', Auth::id())
            ->whereIn('id_question', $ids_questions)
            ->get();

        $score = $reponses->sum('choix.valeur_choix');

        Resultat::create([
            'id_utilisateur' => Auth::id(),
            'score_total'    => $score,
            'date_resultat'  => now()->toDateString(),
        ]); 

        return view('resultat', compact('score'));
    }
}
