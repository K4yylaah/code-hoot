@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border">
            <div class="p-8">
                <h1 class="text-4xl font-bold text-center mb-8 gradient-text lucky-font">MON PROFIL</h1>

                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Section Avatar -->
                    <div class="w-full md:w-1/3 flex flex-col items-center">
                        <div class="w-40 h-40 rounded-full bg-gray-700 mb-4 overflow-hidden border-4 border-kahoot-yellow flex items-center justify-center">
                            <img src="assets/avatars/"
                                 alt="Avatar de Douxzy"
                                 class="w-full h-full object-cover">
                        </div>
                        <button class="mt-4 px-4 py-2 bg-kahoot-yellow text-gray-900 rounded-lg font-bold pixel-font hover:bg-yellow-400 transition-colors">
                            CHANGER D'AVATAR
                        </button>
                    </div>

                    <!-- Section Informations -->
                    <div class="w-full md:w-2/3">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-4 text-kahoot-yellow pixel-font">INFORMATIONS</h2>
                            <div class="space-y-4">
                                <div class="flex items-center">
                                    <span class="w-32 text-gray-300 pixel-font">PSEUDO :</span>
                                    <span class="font-medium">Douxzy</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="w-32 text-gray-300 pixel-font">EMAIL :</span>
                                    <span class="font-medium">Douxzy@edu.esiee-it.fr</span>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-4 text-kahoot-yellow pixel-font">STATISTIQUES</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-300 pixel-font">QUIZZ CRÉÉS</p>
                                    <p class="text-2xl font-bold text-kahoot-green">1</p>
                                </div>
                                <div class="bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-300 pixel-font">QUIZZ JOUÉS</p>
                                    <p class="text-2xl font-bold text-kahoot-pink">200</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="edit_profile.php" class="w-full sm:w-auto flex-1 px-4 py-2 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors text-center">
                                MODIFIER MON PROFIL
                            </a>
                            <a href="my_quizzes.php" class="w-full sm:w-auto flex-1 px-4 py-2 bg-kahoot-green text-white rounded-lg font-bold pixel-font hover:bg-green-500 transition-colors text-center">
                                MES QUIZZ
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('footer')