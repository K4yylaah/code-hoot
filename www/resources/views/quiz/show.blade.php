@extends('header')

@section('content')
<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border mb-8">
            <div class="p-8">
                <h1 class="text-4xl font-bold text-center mb-8 gradient-text lucky-font">{{ strtoupper($quiz->titre) }}</h1>
                <div class="flex justify-between items-center text-gray-300 mb-6">
                    <div class="flex items-center gap-4">
                        <span class="bg-kahoot-pink px-3 py-1 rounded-full text-white">{{ ucfirst($quiz->difficulté) }}</span>
                        <span class="bg-kahoot-blue px-3 py-1 rounded-full text-white">{{ ucfirst($quiz->catégorie) }}</span>
                    </div>
                    <div class="text-sm">Créé par {{ $quiz->user->username }}</div>
                </div>

                <form id="quizForm" action="{{ route('quiz.submit', $quiz->id) }}" method="POST" class="space-y-8">
                    @csrf

                    @foreach($quiz->questions as $index => $question)
                        <div class="bg-gray-700 rounded-lg p-6 question-container">
                            <h3 class="text-xl font-bold text-white mb-4 pixel-font">Question {{ $index + 1 }}</h3>
                            <p class="text-gray-100 mb-4">{{ $question->texte }}</p>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($question->reponses as $reponse)
                                    <div class="relative">
                                        <input type="radio" 
                                               name="reponses[{{ $question->id }}]" 
                                               id="reponse_{{ $reponse->id }}" 
                                               value="{{ $reponse->id }}"
                                               class="peer hidden"
                                               required>
                                        <label for="reponse_{{ $reponse->id }}" 
                                               class="block w-full p-4 bg-gray-600 text-white rounded-lg cursor-pointer
                                                      transition-colors peer-checked:bg-kahoot-pink peer-checked:text-white
                                                      hover:bg-gray-500">
                                            {{ $reponse->texte }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-center mt-8">
                        <button type="submit" 
                                class="px-8 py-4 bg-kahoot-pink text-white text-lg font-bold rounded-lg pixel-font
                                       hover:bg-pink-500 transition-colors">
                            VALIDER MES RÉPONSES
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@include('footer')
