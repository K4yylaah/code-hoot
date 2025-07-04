@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-screen bg-gray-900">
  <div class="container mx-auto px-4 max-w-4xl">
    <!-- En-tête des résultats -->
    <div class="text-center mb-12">
      <h1 class="text-4xl font-bold text-white mb-4 gradient-text lucky-font">
        <i class="fas fa-trophy mr-3 text-kahoot-yellow"></i>
        Résultats du Quiz
      </h1>
      <p class="text-xl text-gray-300 mb-8">
        Voici votre performance pour le quiz <span class="font-bold text-kahoot-yellow">Culture Générale</span>
      </p>

      <!-- Score global -->
      <div class="bg-gray-800 p-8 rounded-xl border-2 border-kahoot-green shadow-lg mb-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <!-- Score -->
          <div class="text-center">
            <div class="text-gray-400 mb-2 flex justify-center">
              <i class="fas fa-chart-line mr-1 text-kahoot-green"></i>
              Votre score
            </div>
            <div class="text-5xl font-bold text-kahoot-green">85%</div>
          </div>

          <!-- Bonnes réponses -->
          <div class="text-center">
            <div class="text-gray-400 mb-2 flex justify-center">
              <i class="fas fa-check-circle mr-1 text-kahoot-green"></i>
              Bonnes réponses
            </div>
            <div class="text-5xl font-bold text-kahoot-green">17/20</div>
          </div>

          <!-- Temps -->
          <div class="text-center">
            <div class="text-gray-400 mb-2 flex justify-center">
              <i class="fas fa-clock mr-1 text-kahoot-yellow"></i>
              Temps
            </div>
            <div class="text-5xl font-bold text-kahoot-yellow">3:45</div>
          </div>
        </div>
      </div>

      <!-- Barre de progression -->
      <div class="w-full bg-gray-700 rounded-full h-4 mb-8">
        <div class="bg-gradient-to-r from-kahoot-green to-kahoot-yellow h-4 rounded-full" style="width: 85%"></div>
      </div>

      <!-- Message de performance -->
      <div class="bg-gray-800 p-6 rounded-xl border-2 border-kahoot-pink shadow-lg mb-12">
        <p class="text-xl text-white font-bold text-center">
          <i class="fas fa-star mr-2 text-kahoot-yellow"></i>
          Excellent travail ! Vous avez dépassé 80% des participants.
        </p>
      </div>
    </div>

    <!-- Détail des réponses -->
    <div class="bg-gray-800 rounded-xl border-2 border-gray-700 overflow-hidden shadow-xl">
      <div class="p-6">
        <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
          <i class="fas fa-list-ol mr-2"></i>
          Détail des réponses
        </h2>

        <!-- Liste des questions -->
        <div class="space-y-6">
          <!-- Question 1 - Réponse correcte -->
          <div class="bg-gray-700 p-6 rounded-lg border-l-4 border-kahoot-green">
            <div class="flex justify-between items-start mb-4">
              <div class="text-lg font-bold text-white flex items-center">
                <i class="fas fa-question-circle mr-2 text-kahoot-pink"></i>
                Question 1
              </div>
              <div class="bg-kahoot-green text-white px-3 py-1 rounded-full text-sm flex items-center">
                <i class="fas fa-plus mr-1"></i> 5 pts
              </div>
            </div>
            <p class="text-gray-300 mb-4">Quelle est la capitale de la France ?</p>
            <div class="space-y-3">
              <!-- Réponse correcte -->
              <div class="bg-gray-600 p-4 rounded-lg border-2 border-kahoot-green">
                <div class="flex items-start">
                  <i class="fas fa-check-circle text-kahoot-green mr-2 mt-1"></i>
                  <div>
                    <span class="text-white font-medium">Paris</span>
                    <p class="text-gray-400 text-sm mt-1">
                      <i class="fas fa-info-circle mr-1"></i>
                      Bonne réponse ! Paris est la capitale de la France depuis le Moyen Âge.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Réponses incorrectes -->
              <div class="bg-gray-600 bg-opacity-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <i class="fas fa-times-circle text-gray-500 mr-2"></i>
                  <span class="text-gray-400">Lyon</span>
                </div>
              </div>
              <div class="bg-gray-600 bg-opacity-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <i class="fas fa-times-circle text-gray-500 mr-2"></i>
                  <span class="text-gray-400">Marseille</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Question 2 - Réponse incorrecte -->
          <div class="bg-gray-700 p-6 rounded-lg border-l-4 border-red-500">
            <div class="flex justify-between items-start mb-4">
              <div class="text-lg font-bold text-white flex items-center">
                <i class="fas fa-question-circle mr-2 text-kahoot-pink"></i>
                Question 2
              </div>
              <div class="bg-red-500 text-white px-3 py-1 rounded-full text-sm flex items-center">
                <i class="fas fa-times mr-1"></i> 0 pt
              </div>
            </div>
            <p class="text-gray-300 mb-4">Quel est le plus long fleuve du monde ?</p>
            <div class="space-y-3">
              <!-- Réponse choisie (incorrecte) -->
              <div class="bg-gray-600 p-4 rounded-lg border-2 border-red-500">
                <div class="flex items-start">
                  <i class="fas fa-times-circle text-red-500 mr-2 mt-1"></i>
                  <div>
                    <span class="text-white font-medium">Nil</span>
                    <p class="text-red-400 text-sm mt-1">
                      <i class="fas fa-info-circle mr-1"></i>
                      Mauvaise réponse. Le Nil est le deuxième plus long fleuve.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Réponse correcte -->
              <div class="bg-gray-600 p-4 rounded-lg border-2 border-kahoot-green">
                <div class="flex items-start">
                  <i class="fas fa-check-circle text-kahoot-green mr-2 mt-1"></i>
                  <div>
                    <span class="text-white font-medium">Amazone</span>
                    <p class="text-gray-400 text-sm mt-1">
                      <i class="fas fa-info-circle mr-1"></i>
                      Bonne réponse ! L'Amazone mesure environ 6 992 km.
                    </p>
                  </div>
                </div>
              </div>

              <!-- Autres réponses -->
              <div class="bg-gray-600 bg-opacity-50 p-4 rounded-lg">
                <div class="flex items-center">
                  <i class="fas fa-times-circle text-gray-500 mr-2"></i>
                  <span class="text-gray-400">Mississippi</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Boutons d'action -->
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
          <a href="<?php echo url('/'); ?>" class="px-8 py-4 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors flex items-center justify-center">
            <i class="fas fa-redo mr-2"></i> Rejouer ce quiz
          </a>
          <a href="<?php echo url('/play'); ?>" class="px-8 py-4 bg-gray-700 text-white rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors flex items-center justify-center">
            <i class="fas fa-arrow-left mr-2"></i> Retour aux quiz
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

@include('footer')
