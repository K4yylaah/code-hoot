<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function create()
    {
        return view('createquiz');
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'nombre_de_questions' => 'required|integer|min:1|max:20',
            'difficulté' => 'required|string|in:facile,moyen,difficile',
            'catégorie' => 'required|string|in:culture,programmation',
            'questions' => 'required|array',
            'questions.*.texte' => 'required|string|max:1000',
            'questions.*.correct' => 'required|integer|min:0|max:3',
            'questions.*.reponses' => 'required|array|size:4',
            'questions.*.reponses.*' => 'required|string|max:255',
        ]);

        try {
            DB::beginTransaction();

            // Créer le quiz
            $quiz = Quiz::create([
                'nombre_de_questions' => $validatedData['nombre_de_questions'],
                'difficulté' => $validatedData['difficulté'],
                'catégorie' => $validatedData['catégorie'],
            ]);

            // Créer les questions et réponses
            foreach ($validatedData['questions'] as $questionData) {
                // Créer la question
                $question = Question::create([
                    'énoncé' => $questionData['texte'],
                    'quiz_id' => $quiz->id,
                ]);

                // Créer les 4 réponses
                foreach ($questionData['reponses'] as $index => $reponseTexte) {
                    Reponse::create([
                        'contenu' => $reponseTexte,
                        'est_correcte' => ($index == $questionData['correct']),
                        'question_id' => $question->id,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('quiz.create')->with('success', 'Quiz créé avec succès!');

        } catch (\Exception $e) {
            DB::rollback();
            
            // Pour déboguer, afficher l'erreur
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de la création du quiz: ' . $e->getMessage());
        }
    }
}
