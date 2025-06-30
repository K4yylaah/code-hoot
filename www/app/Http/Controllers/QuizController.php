<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with(['questions', 'questions.reponses'])
            ->orderBy('created_at', 'desc')
            ->paginate(10); // 10 quiz par page
            
        return view('quiz.index', compact('quizzes'));
    }

    public function home()
    {
        $quizzes = Quiz::with(['questions', 'questions.reponses'])
            ->latest()
            ->take(6)
            ->get();
            
        return view('home', compact('quizzes'));
    }

    public function show($id)
    {
        $quiz = Quiz::with(['questions.reponses'])->findOrFail($id);
        return view('quiz.show', compact('quiz'));
    }


    public function create()
    {
        return view('createquiz');
    }

    public function store(Request $request)
    {
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

            $quiz = Quiz::create([
                'nombre_de_questions' => $validatedData['nombre_de_questions'],
                'difficulté' => $validatedData['difficulté'],
                'catégorie' => $validatedData['catégorie'],
            ]);

            foreach ($validatedData['questions'] as $questionData) {
                $question = Question::create([
                    'énoncé' => $questionData['texte'],
                    'quiz_id' => $quiz->id,
                ]);

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
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de la création du quiz: ' . $e->getMessage());
        }
    }
    public function play($id)
    {
        $quiz = Quiz::with(['questions.reponses'])->findOrFail($id);

        // On mélange les questions et les réponses
        $quiz->questions->each(function ($question) {
            $question->reponses = $question->reponses->shuffle();
        });

        return view('quiz.play', compact('quiz'));
    }

}