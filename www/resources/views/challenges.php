<?php
require_once "header.php";
?>

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
            <div class="p-8">
                <h1 class="text-4xl font-bold text-center mb-8 gradient-text lucky-font">DÉFIS DU JOUR</h1>

                <!-- Liste des défis -->
                <div class="grid gap-6">
                    <!-- Défi 1 -->
                    <div class="bg-gray-700 rounded-lg p-6 border border-gray-600">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold text-kahoot-yellow pixel-font">DÉFI PYTHON</h2>
                            <span class="px-4 py-2 bg-kahoot-green text-white rounded-full text-sm pixel-font">+500 POINTS</span>
                        </div>
                        <p class="text-gray-300 mb-4">Complétez 3 quiz Python avec un score parfait</p>
                        <div class="flex justify-between items-center">
                            <div class="bg-gray-800 px-4 py-2 rounded-full">
                                <span class="text-gray-300 pixel-font">PROGRESSION : </span>
                                <span class="text-kahoot-yellow">1/3</span>
                            </div>
                            <button class="px-6 py-2 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors">
                                COMMENCER
                            </button>
                        </div>
                    </div>

                    <!-- Défi 2 -->
                    <div class="bg-gray-700 rounded-lg p-6 border border-gray-600">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold text-kahoot-pink pixel-font">DÉFI JAVASCRIPT</h2>
                            <span class="px-4 py-2 bg-kahoot-green text-white rounded-full text-sm pixel-font">+300 POINTS</span>
                        </div>
                        <p class="text-gray-300 mb-4">Réussissez le quiz JavaScript avancé avec un score minimum de 90%</p>
                        <div class="flex justify-between items-center">
                            <div class="bg-gray-800 px-4 py-2 rounded-full">
                                <span class="text-gray-300 pixel-font">PROGRESSION : </span>
                                <span class="text-kahoot-yellow">0/1</span>
                            </div>
                            <button class="px-6 py-2 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors">
                                COMMENCER
                            </button>
                        </div>
                    </div>

                    <!-- Défi 3 -->
                    <div class="bg-gray-700 rounded-lg p-6 border border-gray-600">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-2xl font-bold text-kahoot-green pixel-font">DÉFI QUOTIDIEN</h2>
                            <span class="px-4 py-2 bg-kahoot-green text-white rounded-full text-sm pixel-font">+100 POINTS</span>
                        </div>
                        <p class="text-gray-300 mb-4">Participez à 5 quiz différents aujourd'hui</p>
                        <div class="flex justify-between items-center">
                            <div class="bg-gray-800 px-4 py-2 rounded-full">
                                <span class="text-gray-300 pixel-font">PROGRESSION : </span>
                                <span class="text-kahoot-yellow">2/5</span>
                            </div>
                            <button class="px-6 py-2 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors">
                                CONTINUER
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Récompenses -->
                <div class="mt-8">
                    <h2 class="text-2xl font-bold mb-4 text-kahoot-blue pixel-font">RÉCOMPENSES À DÉBLOQUER</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-gray-700 p-4 rounded-lg text-center">
                            <div class="text-3xl mb-2">🏆</div>
                            <p class="text-white pixel-font text-sm">Badge Expert Python</p>
                        </div>
                        <div class="bg-gray-700 p-4 rounded-lg text-center">
                            <div class="text-3xl mb-2">⭐</div>
                            <p class="text-white pixel-font text-sm">Titre "JavaScript Master"</p>
                        </div>
                        <div class="bg-gray-700 p-4 rounded-lg text-center">
                            <div class="text-3xl mb-2">🎮</div>
                            <p class="text-white pixel-font text-sm">Avatar Exclusif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once "footer.php";
?>
