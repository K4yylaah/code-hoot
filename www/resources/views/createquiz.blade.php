@include('header')

<main class="flex flex-col py-12 px-4 min-h-screen bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="mb-12">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2 gradient-text lucky-font">Créer un Nouveau Quiz</h1>
                    <p class="text-gray-300">Créez et configurez votre nouveau quiz ici</p>
                </div>
                <a href="{{ route('quiz.showImport') }}" class="bg-transparent hover:bg-gray-700 border border-yellow-500 text-yellow-500 hover:text-white font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors">
                    IMPORTER</a>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-600 text-white px-6 py-4 rounded-lg mb-6">
                <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-600 text-white px-6 py-4 rounded-lg mb-6">
                <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
            </div>
        @endif

        <form action="{{ route('quiz.store') }}" method="POST"
            class="bg-gray-800 p-6 rounded-xl border-2 border-gray-700 shadow-lg">
            @csrf

            <!-- Configuration du quiz -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div>
                    <label for="nombre_de_questions" class="block text-sm font-medium text-gray-300 mb-2">Nombre de
                        questions</label>
                    <input type="number" id="nombre_de_questions" name="nombre_de_questions" min="1" max="20" value="{{ old('nombre_de_questions', 5) }}" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green @error('nombre_de_questions') border-red-500 @enderror"
                        onchange="generateQuestions()">
                    @error('nombre_de_questions')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="difficulté" class="block text-sm font-medium text-gray-300 mb-2">Difficulté</label>
                    <select id="difficulté" name="difficulté" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green @error('difficulté') border-red-500 @enderror">
                        <option value="">Sélectionner une difficulté</option>
                        <option value="facile" {{ old('difficulté') == 'facile' ? 'selected' : '' }}>Facile</option>
                        <option value="moyen" {{ old('difficulté') == 'moyen' ? 'selected' : '' }}>Moyen</option>
                        <option value="difficile" {{ old('difficulté') == 'difficile' ? 'selected' : '' }}>Difficile</option>
                    </select>
                    @error('difficulté')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="catégorie" class="block text-sm font-medium text-gray-300 mb-2">Catégorie</label>
                    <select id="catégorie" name="catégorie" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green @error('catégorie') border-red-500 @enderror">
                        <option value="">Sélectionner une catégorie</option>
                        <option value="culture" {{ old('catégorie') == 'culture' ? 'selected' : '' }}>Culture</option>
                        <option value="programmation" {{ old('catégorie') == 'programmation' ? 'selected' : '' }}>Programmation</option>
                    </select>
                    @error('catégorie')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Section des questions -->
            <div id="questions-container" class="mb-8">
                <h2 class="text-2xl font-bold text-white mb-6 gradient-text">Questions et Réponses</h2>

                <!-- Les questions seront générées ici par JavaScript -->
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="flex items-center gap-2 px-6 py-3 bg-kahoot-green text-white rounded-lg font-bold pixel-font hover:bg-green-500 transition-colors">
                    <i class="fas fa-plus h-5 w-5"></i>
                    Créer le Quiz
                </button>
            </div>
        </form>

    </div>
</main>

<script>
function generateQuestions() {
    const nombreQuestions = document.getElementById('nombre_de_questions').value;
    const container = document.getElementById('questions-container');
    const oldData = @json(old('questions', []));

    // Gardez le titre
    const titre = container.querySelector('h2');

    // Effacer les questions existantes
    const existingQuestions = container.querySelectorAll('.question-block');
    existingQuestions.forEach(block => block.remove());

    // Générer les nouvelles questions
    for (let i = 0; i < nombreQuestions; i++) {
        const questionIndex = i;
        const questionBlock = document.createElement('div');
        questionBlock.className = 'question-block bg-gray-700 p-6 rounded-lg mb-6 border border-gray-600';

        const oldQuestion = oldData[questionIndex] || {};
        const oldTexte = oldQuestion.texte || '';
        const oldCorrect = oldQuestion.correct || '';
        const oldReponses = oldQuestion.reponses || ['', '', '', ''];

        questionBlock.innerHTML = `
            <h3 class="text-xl font-bold text-white mb-4">Question ${i + 1}</h3>

            <!-- Question -->
            <div class="mb-4">
                <label for="question_${questionIndex}" class="block text-sm font-medium text-gray-300 mb-2">Énoncé de la question</label>
                <textarea id="question_${questionIndex}" name="questions[${questionIndex}][texte]" rows="3" required
                    class="w-full px-4 py-2 bg-gray-600 border border-gray-500 rounded-lg text-white focus:ring-kahoot-green focus:border-kahoot-green @error('questions.${questionIndex}.texte') border-red-500 @enderror"
                    placeholder="Saisissez votre question ici...">${oldTexte}</textarea>
            </div>

            <!-- Réponses -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_0" name="questions[${questionIndex}][correct]" value="0" required
                            ${oldCorrect == '0' ? 'checked' : ''}
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][0]" required value="${oldReponses[0] || ''}"
                            class="flex-1 px-3 py-2 bg-red-600 border border-red-500 rounded-lg text-white focus:ring-red-400 focus:border-red-400"
                            placeholder="Réponse A">
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_1" name="questions[${questionIndex}][correct]" value="1" required
                            ${oldCorrect == '1' ? 'checked' : ''}
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][1]" required value="${oldReponses[1] || ''}"
                            class="flex-1 px-3 py-2 bg-blue-600 border border-blue-500 rounded-lg text-white focus:ring-blue-400 focus:border-blue-400"
                            placeholder="Réponse B">
                    </div>
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_2" name="questions[${questionIndex}][correct]" value="2" required
                            ${oldCorrect == '2' ? 'checked' : ''}
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][2]" required value="${oldReponses[2] || ''}"
                            class="flex-1 px-3 py-2 bg-yellow-600 border border-yellow-500 rounded-lg text-white focus:ring-yellow-400 focus:border-yellow-400"
                            placeholder="Réponse C">
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="radio" id="correct_${questionIndex}_3" name="questions[${questionIndex}][correct]" value="3" required
                            ${oldCorrect == '3' ? 'checked' : ''}
                            class="w-4 h-4 text-kahoot-green bg-gray-600 border-gray-500 focus:ring-kahoot-green">
                        <input type="text" name="questions[${questionIndex}][reponses][3]" required value="${oldReponses[3] || ''}"
                            class="flex-1 px-3 py-2 bg-green-600 border border-green-500 rounded-lg text-white focus:ring-green-400 focus:border-green-400"
                            placeholder="Réponse D">
                    </div>
                </div>
            </div>

            <p class="text-sm text-gray-400">
                <i class="fas fa-info-circle mr-2"></i>
                Sélectionnez la bonne réponse en cochant le bouton radio correspondant
            </p>
        `;

        container.appendChild(questionBlock);
    }
}

// Générer les questions initiales au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    generateQuestions();
});
</script>

@include('footer')
