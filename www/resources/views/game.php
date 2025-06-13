<?php require_once "header.php"; ?>
<div id="gameContainer" class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
    <div class="p-8">
        <div id="quizContent">
            <div id="question-1" class="question-container">
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-kahoot-yellow pixel-font">
                            QUESTION 1/5
                        </h2>
                        <div class="text-gray-300 pixel-font">
                            TEMPS RESTANT: <span class="time-remaining">30</span>s
                        </div>
                    </div>
                    <div class="bg-gray-700 p-6 rounded-lg mb-6 border border-gray-600">
                        <p class="text-xl font-medium text-white">Quelle est la capitale de la France ?</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <button
                        class="answer-option bg-gray-700 hover:bg-gray-600 border-2 border-gray-600 hover:border-kahoot-yellow p-4 rounded-lg text-left transition-all">
                        <span class="block text-lg font-medium text-white">1. Londres</span>
                    </button>
                    <button
                        class="answer-option bg-gray-700 hover:bg-gray-600 border-2 border-gray-600 hover:border-kahoot-yellow p-4 rounded-lg text-left transition-all">
                        <span class="block text-lg font-medium text-white">2. Paris</span>
                    </button>
                    <button
                        class="answer-option bg-gray-700 hover:bg-gray-600 border-2 border-gray-600 hover:border-kahoot-yellow p-4 rounded-lg text-left transition-all">
                        <span class="block text-lg font-medium text-white">3. Berlin</span>
                    </button>
                    <button
                        class="answer-option bg-gray-700 hover:bg-gray-600 border-2 border-gray-600 hover:border-kahoot-yellow p-4 rounded-lg text-left transition-all">
                        <span class="block text-lg font-medium text-white">4. Madrid</span>
                    </button>
                </div>
                <div class="mt-10 flex justify-between">
                    <button
                        class="px-6 py-3 bg-gray-700 text-white rounded-lg pixel-font hover:bg-gray-600 transition-colors previous-question disabled:opacity-50 disabled:cursor-not-allowed"
                        disabled>
                        QUESTION PRÉCÉDENTE
                    </button>
                    <button
                        class="px-6 py-3 bg-kahoot-green text-white rounded-lg font-bold pixel-font hover:bg-green-500 transition-colors next-question">
                        QUESTION SUIVANTE
                    </button>
                </div>
            </div>
            <div id="resultsScreen" class="hidden">
                <div class="text-center space-y-8">
                    <h2
                        class="text-4xl font-bold mb-4 bg-gradient-to-r from-kahoot-yellow to-kahoot-pink bg-clip-text text-transparent lucky-font">
                        RÉSULTATS</h2>

                    <div class="bg-gray-700 p-8 rounded-lg border border-gray-600">
                        <p class="text-xl mb-6">Votre score</p>
                        <div class="flex justify-center items-center gap-4 mb-6">
                            <div class="w-24 h-24 bg-kahoot-green rounded-full flex items-center justify-center">
                                <span id="finalScore" class="text-4xl font-bold text-white">0</span>
                            </div>
                            <span class="text-2xl font-medium">/5</span>
                        </div>

                        <div class="w-full bg-gray-600 rounded-full h-4 mb-6">
                            <div id="scoreProgress" class="bg-kahoot-green h-4 rounded-full" style="width: 0%"></div>
                        </div>

                        <p id="performanceText" class="text-lg font-medium">Continuez à vous entraîner !</p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <button id="restartQuiz"
                            class="px-8 py-4 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors">
                            REJOUER
                        </button>
                        <button id="backToQuizzes"
                            class="px-8 py-4 bg-gray-700 text-white rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors">
                            RETOUR AUX QUIZ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>