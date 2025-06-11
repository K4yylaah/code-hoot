<?php require_once "header.php"; ?>

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl space-y-8">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
            <div class="p-8">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-1/3">
                        <div class="w-full h-40 bg-gray-700 rounded-lg overflow-hidden border-2 border-gray-600">
                            <img src="assets/thumbnails/quiz-thumbnail.jpg"
                                 alt="Image du quiz"
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                    <div class="w-full md:w-2/3 space-y-6">
                        <div>
                            <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-kahoot-yellow to-kahoot-pink bg-clip-text text-transparent lucky-font">Quiz Culture Générale</h1>
                            <p class="text-gray-300">Testez vos connaissances en culture générale avec ce quiz de 5 questions.</p>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                <span class="text-gray-300 pixel-font">QUESTIONS :</span>
                                <span class="font-medium text-white">5</span>
                            </div>
                            <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                <span class="text-gray-300 pixel-font">DIFFICULTÉ :</span>
                                <span class="font-medium text-white">Moyen</span>
                            </div>
                            <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                <span class="text-gray-300 pixel-font">CATÉGORIE :</span>
                                <span class="font-medium text-white">Culture Générale</span>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="<?php echo url('/game'); ?>" class="w-full sm:w-auto flex-1 px-6 py-3 bg-kahoot-yellow text-gray-900 rounded-lg font-bold pixel-font hover:bg-yellow-400 transition-colors text-center">COMMENCER LE QUIZ</a>
                            <a class="w-full sm:w-auto px-6 py-3 bg-gray-700 text-kahoot-pink rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors text-center flex items-center justify-center gap-2">FAVORIS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once "footer.php"; ?>
