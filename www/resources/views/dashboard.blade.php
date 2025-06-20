@include('header')

<main class="flex flex-col py-12 px-4 min-h-screen bg-gray-900">
  <div class="container mx-auto px-4">
    <div class="mb-12">
      <h1 class="text-4xl font-bold text-white mb-2 gradient-text lucky-font">Mon Tableau de Bord</h1>
      <p class="text-gray-300">Gérez tous vos quiz depuis cet espace centralisé</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">      
      <div class="bg-gray-800 p-6 rounded-xl border-2 border-kahoot-pink shadow-lg">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-semibold text-white">Quiz créés</h3>
          <i class="icon-quiz h-8 w-8 text-kahoot-pink"></i>
        </div>
        <p class="text-3xl font-bold text-kahoot-pink">12</p>
      </div>
      <div class="bg-gray-800 p-6 rounded-xl border-2 border-kahoot-yellow shadow-lg">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-semibold text-white">Participants totaux</h3>
          <i class="icon-users h-8 w-8 text-kahoot-yellow"></i>
        </div>
        <p class="text-3xl font-bold text-kahoot-yellow">458</p>
      </div>
      <div class="bg-gray-800 p-6 rounded-xl border-2 border-kahoot-green shadow-lg">
        <div class="flex items-center justify-between mb-4">
          <h3 class="text-xl font-semibold text-white">Quiz les plus populaires</h3>
          <i class="icon-trending h-8 w-8 text-kahoot-green"></i>
        </div>
        <p class="text-3xl font-bold text-kahoot-green">Culture Générale</p>
      </div>
    </div>
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
      <h2 class="text-2xl font-bold text-white">Mes Quiz</h2>
      <button id="createQuizBtn" class="flex items-center gap-2 px-6 py-3 bg-kahoot-green text-white rounded-lg font-bold pixel-font hover:bg-green-500 transition-colors">
        <i class="icon-plus h-5 w-5"></i>
        Créer un nouveau quiz
      </button>
    </div>
    <div class="bg-gray-800 rounded-xl border-2 border-gray-700 overflow-hidden shadow-xl">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
          <thead class="bg-gray-700">
            <tr>
              <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Titre</th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Catégorie</th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Participants</th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Date de création</th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
          </thead>
          <tbody class="bg-gray-800 divide-y divide-gray-700">
            <tr class="hover:bg-gray-700 transition-colors">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-full bg-kahoot-pink flex items-center justify-center mr-3">
                    <span class="text-white font-bold">CG</span>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-white">Culture Générale</div>
                    <div class="text-sm text-gray-400">15 questions</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-kahoot-yellow bg-opacity-20 text-kahoot-yellow">
                  Culture
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <i class="icon-users h-5 w-5 text-kahoot-green mr-1"></i>
                  <span class="text-white">128</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">12/05/2023</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <button class="text-kahoot-yellow hover:text-yellow-400" title="Modifier">
                    <i class="icon-edit h-5 w-5"></i>
                  </button>
                  <button class="text-kahoot-green hover:text-green-400" title="Voir les détails">
                    <i class="icon-eye h-5 w-5"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-400" title="Supprimer">
                    <i class="icon-trash h-5 w-5"></i>
                  </button>
                </div>
              </td>
            </tr>
            <tr class="hover:bg-gray-700 transition-colors">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-full bg-kahoot-yellow flex items-center justify-center mr-3">
                    <span class="text-gray-900 font-bold">JS</span>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-white">JavaScript Avancé</div>
                    <div class="text-sm text-gray-400">20 questions</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-kahoot-blue bg-opacity-20 text-kahoot-blue">
                  Programmation
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <i class="icon-users h-5 w-5 text-kahoot-green mr-1"></i>
                  <span class="text-white">89</span>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">05/04/2023</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <button class="text-kahoot-yellow hover:text-yellow-400" title="Modifier">
                    <i class="icon-edit h-5 w-5"></i>
                  </button>
                  <button class="text-kahoot-green hover:text-green-400" title="Voir les détails">
                    <i class="icon-eye h-5 w-5"></i>
                  </button>
                  <button class="text-red-500 hover:text-red-400" title="Supprimer">
                    <i class="icon-trash h-5 w-5"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

@include('footer')