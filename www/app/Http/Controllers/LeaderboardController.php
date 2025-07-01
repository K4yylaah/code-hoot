<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use App\Models\User;

class LeaderboardController extends Controller
{
    private $resultTable = null;
    
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'week');
        
        try {
            // Détection automatique de la table de résultats
            $this->detectResultTable();
            
            if (!$this->resultTable) {
                // Si aucune table n'est trouvée, afficher les utilisateurs sans scores
                return $this->showUsersOnly($filter);
            }

            // Récupération des données depuis la base
            $leaderboard = $this->getLeaderboardData($filter);

        } catch (\Exception $e) {
            // Log de l'erreur pour le debugging
            \Log::error('Erreur dans le leaderboard: ' . $e->getMessage());
            
            // Fallback : afficher les utilisateurs sans scores
            return $this->showUsersOnly($filter);
        }

        return view('leaderboard.index', compact('leaderboard', 'filter'));
    }

    private function detectResultTable()
    {
        // Liste des noms de tables possibles pour les résultats
        $possibleTables = [
            'game_results',
            'quiz_results', 
            'results',
            'quiz_sessions',
            'game_sessions',
            'scores',
            'user_quiz_results',
            'player_scores'
        ];

        foreach ($possibleTables as $table) {
            if (Schema::hasTable($table)) {
                $this->resultTable = $table;
                break;
            }
        }
    }

    private function getLeaderboardData($filter)
    {
        $table = $this->resultTable;
        
        // Détection des colonnes disponibles
        $columns = Schema::getColumnListing($table);
        
        // Mapping flexible des colonnes
        $scoreColumn = $this->findColumnName($columns, ['score', 'points', 'total_score', 'result']);
        $userColumn = $this->findColumnName($columns, ['user_id', 'player_id', 'userId']);
        $dateColumn = $this->findColumnName($columns, ['created_at', 'date', 'timestamp', 'played_at']);
        $quizColumn = $this->findColumnName($columns, ['quiz_completes', 'completed', 'quiz_count', 'games_played']);

        // Construction de la requête dynamique
        $query = DB::table('users')
            ->leftJoin($table, 'users.id', '=', "$table.$userColumn");

        // Sélection dynamique des colonnes
        $selectColumns = [
            'users.id',
            'users.name as user_name',
            'users.email',
            'users.created_at as user_created_at'
        ];

        if ($scoreColumn) {
            $selectColumns[] = DB::raw("COALESCE(SUM($table.$scoreColumn), 0) as total_score");
            $selectColumns[] = DB::raw("CASE 
                WHEN COUNT($table.id) > 0 
                THEN ROUND(AVG($table.$scoreColumn), 0)
                ELSE 0 
            END as average");
        } else {
            $selectColumns[] = DB::raw("0 as total_score");
            $selectColumns[] = DB::raw("0 as average");
        }

        if ($quizColumn) {
            $selectColumns[] = DB::raw("COALESCE(SUM($table.$quizColumn), COUNT($table.id)) as quiz_completed");
        } else {
            $selectColumns[] = DB::raw("COUNT($table.id) as quiz_completed");
        }

        $query->select($selectColumns)
              ->groupBy('users.id', 'users.name', 'users.email', 'users.created_at');

        // Application des filtres temporels si la colonne date existe
        if ($dateColumn && $filter !== 'all') {
            switch ($filter) {
                case 'week':
                    $query->where("$table.$dateColumn", '>=', Carbon::now()->startOfWeek());
                    break;
                case 'month':
                    $query->where("$table.$dateColumn", '>=', Carbon::now()->startOfMonth());
                    break;
                case 'year':
                    $query->where("$table.$dateColumn", '>=', Carbon::now()->startOfYear());
                    break;
            }
        }

        // Tri par score décroissant
        $orderColumn = $scoreColumn ? 'total_score' : 'quiz_completed';
        $leaderboard = $query
            ->orderBy($orderColumn, 'desc')
            ->orderBy('average', 'desc')
            ->orderBy('users.name', 'asc')
            ->paginate(15);

        return $leaderboard;
    }

    private function showUsersOnly($filter)
    {
        // Afficher tous les utilisateurs avec des scores à zéro
        $users = User::select([
                'id',
                'name as user_name',
                'email',
                'created_at as user_created_at',
                DB::raw('0 as total_score'),
                DB::raw('0 as average'),
                DB::raw('0 as quiz_completed')
            ])
            ->orderBy('name')
            ->paginate(15);

        return view('leaderboard.index', [
            'leaderboard' => $users,
            'filter' => $filter,
            'message' => 'Aucune données de jeu trouvées. Affichage des utilisateurs inscrits.'
        ]);
    }

    private function findColumnName($columns, $possibleNames)
    {
        foreach ($possibleNames as $name) {
            if (in_array($name, $columns)) {
                return $name;
            }
        }
        return null;
    }

    // Méthode pour obtenir des statistiques générales
    public function getStats()
    {
        return [
            'total_users' => User::count(),
            'total_games' => $this->resultTable ? DB::table($this->resultTable)->count() : 0,
            'active_players' => $this->resultTable ? 
                DB::table($this->resultTable)
                    ->where('created_at', '>=', Carbon::now()->subDays(7))
                    ->distinct('user_id')
                    ->count() : 0
        ];
    }
}
