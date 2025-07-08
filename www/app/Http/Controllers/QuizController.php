<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function showImport()
    {
        // Affiche la vue du formulaire d'importation
        return view('quiz.import');
    }

    public function import(Request $request)
    {
        // Check si le fichier est un fichier CSV
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        try {
            // Début de la transaction pour assurer l'intégrité des données
            DB::beginTransaction();

            // Lecture du fichier CSV
            $file = $request->file('csv_file');
            $csvData = array_map('str_getcsv', file($file->getRealPath()));

            // Validation de la première ligne
            $quizInfo = array_shift($csvData);
            if (count($quizInfo) < 3) {
                throw new \Exception('Le format du fichier CSV est invalide. La première ligne doit contenir : nombre_de_questions,difficulté,catégorie');
            }

            // Validation des valeurs
            if (!in_array($quizInfo[1], ['facile', 'moyen', 'difficile'])) {
                throw new \Exception('La difficulté doit être : facile, moyen ou difficile');
            }
            if (!in_array($quizInfo[2], ['culture', 'programmation'])) {
                throw new \Exception('La catégorie doit être : culture ou programmation');
            }

            // Création du quiz
            $quiz = Quiz::create([
                'nombre_de_questions' => count($csvData),
                'difficulté' => $quizInfo[1],
                'catégorie' => $quizInfo[2],
            ]);

            // Traitement des questions
            foreach ($csvData as $index => $row) {
                if (count($row) < 6) {
                    throw new \Exception('Ligne ' . ($index + 2) . ' invalide : format attendu : question,reponse1,reponse2,reponse3,reponse4,index_bonne_reponse');
                }

                $question = Question::create([
                    'énoncé' => $row[0],
                    'quiz_id' => $quiz->id,
                ]);

                // Récupération de l'index de la bonne réponse (dernière colonne)
                $bonneReponseIndex = intval($row[5]);
                if ($bonneReponseIndex < 1 || $bonneReponseIndex > 4) {
                    throw new \Exception('Index de la bonne réponse invalide à la ligne ' . ($index + 2) . '. Doit être entre 1 et 4.');
                }

                // Création des réponses
                for ($i = 1; $i <= 4; $i++) {
                    if (empty($row[$i])) {
                        throw new \Exception('Réponse manquante à la ligne ' . ($index + 2));
                    }
                    Reponse::create([
                        'contenu' => $row[$i],
                        'est_correcte' => ($i === $bonneReponseIndex),
                        'question_id' => $question->id,
                    ]);
                }
            }

            // Si OK, validation de la transaction
            DB::commit();
            return redirect()->route('quiz.index')
                ->with('success', 'Quiz importé avec succès !!!');

        } catch (\Exception $e) {
            // En cas d'érreur, on annule tout
            DB::rollback();
            return redirect()->back()
                ->with('error', 'Erreur lors de l\'import du quiz: ' . $e->getMessage());
        }
    }

    public function export($id)
    {
        $quiz = Quiz::with(['questions.reponses'])->findOrFail($id);

        $filename = 'quiz_' . $quiz->id . '_' . Str::slug($quiz->catégorie) . '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function() use ($quiz) {
            $file = fopen('php://output', 'w');

            // En-tête avec les informations du quiz
            fputcsv($file, [
                $quiz->nombre_de_questions,
                $quiz->difficulté,
                $quiz->catégorie,
            ]);

            // Questions ét réponses
            foreach ($quiz->questions as $question) {
                $reponses = $question->reponses->toArray();
                $bonneReponseIndex = 0;

                foreach ($reponses as $index => $reponse) {
                    if ($reponse['est_correcte']) {
                        $bonneReponseIndex = $index + 1;
                        break;
                    }
                }

                fputcsv($file, [
                    $question->énoncé,
                    $reponses[0]['contenu'],
                    $reponses[1]['contenu'],
                    $reponses[2]['contenu'],
                    $reponses[3]['contenu'],
                    $bonneReponseIndex,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
