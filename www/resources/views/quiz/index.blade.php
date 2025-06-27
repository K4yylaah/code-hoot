@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl space-y-8">
        @if(isset($quizzes) && $quizzes->count() > 0)
            @foreach($quizzes as $quiz)
                <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
                    <div class="p-8">
                        <div class="flex flex-col md:flex-row gap-8">
                            <div class="w-full md:w-1/3">
                                <div class="w-full h-40 bg-gray-700 rounded-lg overflow-hidden border-2 border-gray-600">
                                    <img src="{{ asset('assets/thumbnails/quiz-thumbnail.jpg') }}"
                                         alt="Image du quiz"
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div class="w-full md:w-2/3 space-y-6">
                                <div>
                                    <h1 class="text-3xl font-bold mb-2 bg-gradient-to-r from-kahoot-yellow to-kahoot-pink bg-clip-text text-transparent lucky-font">
                                        Quiz {{ ucfirst($quiz->catégorie) }}
                                    </h1>
                                    <p class="text-gray-300">
                                        Testez vos connaissances en {{ $quiz->catégorie }} avec ce quiz de {{ $quiz->nombre_de_questions }} questions.
                                    </p>
                                </div>
                                <div class="flex flex-wrap gap-3">
                                    <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                        <span class="text-gray-300 pixel-font">QUESTIONS :</span>
                                        <span class="font-medium text-white">{{ $quiz->nombre_de_questions }}</span>
                                    </div>
                                    <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                        <span class="text-gray-300 pixel-font">DIFFICULTÉ :</span>
                                        <span class="font-medium text-white">{{ ucfirst($quiz->difficulté) }}</span>
                                    </div>
                                    <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                        <span class="text-gray-300 pixel-font">CATÉGORIE :</span>
                                        <span class="font-medium text-white">{{ ucfirst($quiz->catégorie) }}</span>
                                    </div>
                                    <div class="bg-gray-700 px-4 py-2 rounded-full text-sm">
                                        <span class="text-gray-300 pixel-font">CRÉÉ LE :</span>
                                        <span class="font-medium text-white">{{ $quiz->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <a href="{{ route('game', ['quiz' => $quiz->id]) }}" 
                                       class="w-full sm:w-auto flex-1 px-6 py-3 bg-kahoot-yellow text-gray-900 rounded-lg font-bold pixel-font hover:bg-yellow-400 transition-colors text-center">
                                        COMMENCER LE QUIZ
                                    </a>
                                    <button class="w-full sm:w-auto px-6 py-3 bg-gray-700 text-kahoot-pink rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors text-center flex items-center justify-center gap-2"
                                            onclick="toggleFavorite({{ $quiz->id }})">
                                        <i class="fas fa-heart"></i>
                                        FAVORIS
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
            <!-- Pagination si nécessaire -->
            @if(method_exists($quizzes, 'links'))
                <div class="mt-8 flex justify-center">
                    {{ $quizzes->links('pagination::tailwind') }}
                </div>
            @endif
        @else
            <!-- Message si aucun quiz -->
            <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700 text-center py-12">
                <div class="text-gray-400 mb-4">
                    <i class="fas fa-question-circle text-6xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-white mb-2">Aucun quiz disponible</h2>
                <p class="text-gray-300 mb-6">Il n'y a pas encore de quiz à afficher.</p>
                <a href="{{ route('quiz.create') }}" 
                   class="inline-block px-6 py-3 bg-kahoot-yellow text-gray-900 rounded-lg font-bold pixel-font hover:bg-yellow-400 transition-colors">
                    CRÉER UN QUIZ
                </a>
            </div>
        @endif
    </div>
</main>

<script>
function toggleFavorite(quizId) {
    // Fonction pour gérer les favoris
    console.log('Toggle favorite for quiz:', quizId);
    // Ici vous pouvez ajouter une requête AJAX pour gérer les favoris
}
</script>

@include('footer')
