<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoreSeeder extends Seeder
{
    public function run(): void
    {
        // Récupérer les IDs existants
        $existingUserIds = DB::table('users')->pluck('id')->toArray();
        $existingQuizIds = DB::table('quizzes')->pluck('id')->toArray();
        
        // Vérifier s'il y a des utilisateurs et des quiz
        if (empty($existingUserIds) || empty($existingQuizIds)) {
            $this->command->info('Aucun utilisateur ou quiz trouvé. Créez-les d\'abord.');
            return;
        }
        
        $scores = [];
        
        for ($i = 0; $i < 20; $i++) {
            $scores[] = [
                'score' => rand(10, 100),
                'quiz_completés' => rand(0, 1),
                'quiz_id' => $existingQuizIds[array_rand($existingQuizIds)],
                'user_id' => $existingUserIds[array_rand($existingUserIds)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        DB::table('scores')->insert($scores);
    }
}
