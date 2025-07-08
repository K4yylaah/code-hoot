@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl space-y-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold pixel-font text-yellow-300">LISTE DES QUIZ</h1>
            <div class="flex space-x-4">
                <a href="{{ route('quiz.create') }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors">
                    CRÉER
                </a>
                <a href="{{ route('quiz.showImport') }}"
                   class="bg-transparent hover:bg-gray-700 border border-yellow-500 text-yellow-500 hover:text-white font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors">
                    IMPORTER
                </a>
            </div>
        </div>
        @if(isset($quizzes) && $quizzes->count() > 0)
        @foreach($quizzes as $quiz)
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
            <div class="p-8">
                <div class="flex flex-col gap-8">
                    <div class="w-full space-y-6">
                        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700 p-8">
                            <div class="flex justify-between items-center mb-6">
                                <h1 class="text-3xl font-bold text-white lucky-font">
                                    Quiz {{ ucfirst($quiz->catégorie) }}
                                </h1>
                                <div class="flex flex-col space-y-2">
                                    <a href="{{ route('quiz.export', ['quiz' => $quiz->id]) }}"
                                       class="bg-transparent hover:bg-gray-700 border border-yellow-500 text-yellow-500 hover:text-white font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors text-center">
                                        EXPORTER
                                    </a>
                                    <a href="{{ route('quiz.edit', $quiz->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors text-center">
                                        MODIFIER
                                    </a>
                                    <button type="button"
                                            onclick="openDeleteModal({{ $quiz->id }})"
                                            class="w-full bg-transparent hover:bg-gray-700 border border-yellow-500 text-yellow-500 hover:text-white font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors text-center">
                                        SUPPRIMER
                                    </button>
                                </div>
                            </div>
                            <p class="text-gray-300">
                                Testez vos connaissances en {{ $quiz->catégorie }} avec ce quiz de
                                {{ $quiz->nombre_de_questions }} questions.
                            </p>
                        </div>

                        <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center justify-center z-50">
                            <div class="bg-gray-800 rounded-lg p-6 max-w-sm mx-4 border-2 border-yellow-500">
                                <h3 class="text-xl font-bold text-white mb-4 pixel-font">Confirmation de suppression</h3>
                                <p class="text-gray-300 mb-6">Êtes-vous sûr de vouloir supprimer ce quiz ? Cette action est irréversible.</p>
                                <div class="flex justify-end space-x-3">
                                    <button onclick="closeDeleteModal()"
                                            class="bg-transparent hover:bg-gray-700 border border-yellow-500 text-yellow-500 hover:text-white font-bold py-2 px-4 rounded-lg pixel-font text-sm transition-colors">
                                        ANNULER
                                    </button>
                                    <form id="deleteForm" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg pixel-font text-sm transition-colors">
                                            CONFIRMER
                                        </button>
                                    </form>
                                </div>
                            </div>
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

function openDeleteModal(quizId) {
    const modal = document.getElementById('deleteModal');
    const deleteForm = document.getElementById('deleteForm');

    // Mettre à jour l'action du formulaire avec l'ID du quiz
    deleteForm.action = `/quiz/${quizId}`;

    // Afficher la modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    // Empêcher le défilement de la page
    document.body.style.overflow = 'hidden';
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');

    // Cacher la modal
    modal.classList.remove('flex');
    modal.classList.add('hidden');

    // Réactiver le défilement de la page
    document.body.style.overflow = 'auto';
}

// Fermer la modal si on clique en dehors
document.getElementById('deleteModal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeDeleteModal();
    }
});

// Empêcher la fermeture quand on clique sur le contenu de la modal
document.querySelector('#deleteModal > div').addEventListener('click', function(event) {
    event.stopPropagation();
});

</script>

@include('footer')
