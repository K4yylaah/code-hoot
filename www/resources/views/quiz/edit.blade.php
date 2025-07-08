@include('header')

<main class="flex flex-col py-12 px-4 min-h-screen bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="mb-12">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2 gradient-text lucky-font">Modifier le Quiz</h1>
                    <p class="text-gray-300">Modifiez les informations de votre quiz ici</p>
                </div>
            </div>
        </div>

        @if(session('error'))
            <div class="bg-red-600 text-white px-6 py-4 rounded-lg mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <form action="{{ route('quiz.update', $quiz->id) }}" method="POST"
              class="bg-gray-800 p-6 rounded-xl border-2 border-gray-700 shadow-lg">
            @csrf
            @method('PUT')

            <!-- Configuration du quiz -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div>
                    <label for="nombre_de_questions" class="block text-sm font-medium text-gray-300 mb-2">Nombre de questions</label>
                    <input type="number" id="nombre_de_questions" name="nombre_de_questions" min="1" max="20"
                           value="{{ old('nombre_de_questions', $quiz->nombre_de_questions) }}" required
                           class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green"
                           onchange="generateQuestions()">
                </div>
                <div>
                    <label for="difficulté" class="block text-sm font-medium text-gray-300 mb-2">Difficulté</label>
                    <select id="difficulté" name="difficulté" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green">
                        <option value="facile" {{ $quiz->difficulté == 'facile' ? 'selected' : '' }}>Facile</option>
                        <option value="moyen" {{ $quiz->difficulté == 'moyen' ? 'selected' : '' }}>Moyen</option>
                        <option value="difficile" {{ $quiz->difficulté == 'difficile' ? 'selected' : '' }}>Difficile</option>
                    </select>
                </div>
                <div>
                    <label for="catégorie" class="block text-sm font-medium text-gray-300 mb-2">Catégorie</label>
                    <select id="catégorie" name="catégorie" required
                            class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green">
                        <option value="culture" {{ $quiz->catégorie == 'culture' ? 'selected' : '' }}>Culture</option>
                        <option value="programmation" {{ $quiz->catégorie == 'programmation' ? 'selected' : '' }}>Programmation</option>
                    </select>
                </div>
            </div>

            <!-- Section des questions -->
            <div id="questions-container" class="mb-8">
                <h2 class="text-2xl font-bold text-white mb-6 gradient-text">Questions et Réponses</h2>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('quiz.index') }}"
                   class="px-6 py-3 bg-gray-700 text-white rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors">
                    Annuler
                </a>
                <button type="submit"
                        class="px-6 py-3 bg-kahoot-green text-white rounded-lg font-bold pixel-font hover:bg-green-500 transition-colors">
                    Confirmer les modifications
                </button>
            </div>
        </form>
    </div>
</main>

<script>
    function generateQuestions() {
        const container = document.getElementById('questions-container');
        const quiz = @json($quiz);
        const questions = quiz.questions;
        const nombreQuestions = document.getElementById('nombre_de_questions').value;

        // Gardez le titre
        const titre = container.querySelector('h2');
        container.innerHTML = '';
        container.appendChild(titre);

        for (let i = 0; i < nombreQuestions; i++) {
            const questionIndex = i;
            const questionBlock = document.createElement('div');
            questionBlock.className = 'question-block bg-gray-700 p-6 rounded-lg mb-6 border border-gray-600';

            const currentQuestion = questions[i] || {};
            const currentReponses = currentQuestion.reponses || [{}, {}, {}, {}];
            let bonneReponseIndex = 0;

            // Trouve l'index de la bonne réponse
            currentReponses.forEach((reponse, index) => {
                if (reponse.est_correcte) {
                    bonneReponseIndex = index;
                }
            });

            questionBlock.innerHTML = `
            <h3 class="text-xl font-bold text-white mb-4">Question ${i + 1}</h3>
            <div class="mb-4">
                <label for="question_${questionIndex}" class="block text-sm font-medium text-gray-300 mb-2">Énoncé de la question</label>
                <textarea id="question_${questionIndex}" name="questions[${questionIndex}][texte]" rows="3" required
                    class="w-full px-4 py-2 bg-gray-600 border border-gray-500 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green"
                    placeholder="Saisissez votre question ici...">${currentQuestion.énoncé || ''}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_0" name="questions[${questionIndex}][correct]" value="0"
                            ${bonneReponseIndex === 0 ? 'checked' : ''} required
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][0]" required
                            value="${currentReponses[0]?.contenu || ''}"
                            class="flex-1 px-3 py-2 bg-red-600 border border-red-500 rounded-lg text-white focus:ring-red-400 focus:border-red-400"
                            placeholder="Réponse A">
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_1" name="questions[${questionIndex}][correct]" value="1"
                            ${bonneReponseIndex === 1 ? 'checked' : ''} required
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][1]" required
                            value="${currentReponses[1]?.contenu || ''}"
                            class="flex-1 px-3 py-2 bg-blue-600 border border-blue-500 rounded-lg text-white focus:ring-blue-400 focus:border-blue-400"
                            placeholder="Réponse B">
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_2" name="questions[${questionIndex}][correct]" value="2"
                            ${bonneReponseIndex === 2 ? 'checked' : ''} required
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][2]" required
                            value="${currentReponses[2]?.contenu || ''}"
                            class="flex-1 px-3 py-2 bg-yellow-600 border border-yellow-500 rounded-lg text-white focus:ring-yellow-400 focus:border-yellow-400"
                            placeholder="Réponse C">
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_3" name="questions[${questionIndex}][correct]" value="3"
                            ${bonneReponseIndex === 3 ? 'checked' : ''} required
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][3]" required
                            value="${currentReponses[3]?.contenu || ''}"
                            class="flex-1 px-3 py-2 bg-green-600 border border-green-500 rounded-lg text-white focus:ring-green-400 focus:border-green-400"
                            placeholder="Réponse D">
                    </div>
                </div>
            </div>
        `;

            container.appendChild(questionBlock);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        generateQuestions();
    });
</script>

@include('footer')
