
@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
            <div class="p-8">
                <h2 class="text-3xl font-bold mb-6 text-white lucky-font">Importer un Quiz</h2>

                @if(session('error'))
                    <div class="bg-red-900 border-2 border-red-700 text-red-200 px-4 py-3 rounded mb-6">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('quiz.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2 pixel-font">
                            FICHIER CSV
                        </label>
                        <input type="file"
                               name="csv_file"
                               accept=".csv,.txt"
                               class="w-full px-4 py-3 bg-gray-700 border-2 border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-kahoot-yellow">
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                                class="w-full sm:w-auto flex-1 px-6 py-3 bg-kahoot-yellow text-gray-900 rounded-lg font-bold pixel-font hover:bg-yellow-400 transition-colors">
                            IMPORTER LE QUIZ
                        </button>
                        <a href="{{ route('quiz.index') }}"
                           class="w-full sm:w-auto px-6 py-3 bg-gray-700 text-gray-300 rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors text-center">
                            RETOUR À LA LISTE
                        </a>
                    </div>
                </form>

                <div class="mt-8 p-6 bg-gray-700 rounded-lg">
                    <h3 class="text-xl font-bold mb-4 text-white pixel-font">FORMAT DU FICHIER CSV</h3>
                    <pre class="bg-gray-800 p-4 rounded-lg text-gray-300 font-mono text-sm">
                        nombre_de_questions,difficulté,catégorie
                        question,reponse1,reponse2,reponse3,reponse4,reponse_correcte</pre>
                    <p class="mt-4 text-gray-400">
                        Le fichier doit contenir une première ligne avec les informations du quiz,
                        suivie d'une questions, leurs réponses et la bonne réponses.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

@include('footer')
