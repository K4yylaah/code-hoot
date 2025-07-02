@extends('header')

@section('content')
<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border">
            <div class="p-8 text-center">
                <h1 class="text-4xl font-bold mb-8 gradient-text lucky-font">RÉSULTATS DU QUIZ</h1>
                
                <div class="bg-gray-700 rounded-lg p-8 mb-8">
                    <div class="text-6xl font-bold text-kahoot-pink mb-4">{{ $score }}/{{ $total }}</div>
                    <div class="text-2xl text-gray-300">{{ number_format($percentage, 1) }}%</div>
                    
                    @if ($percentage >= 80)
                        <p class="text-xl text-green-400 mt-4">Excellent travail ! 🎉</p>
                    @elseif ($percentage >= 60)
                        <p class="text-xl text-yellow-400 mt-4">Bon travail ! 👍</p>
                    @else
                        <p class="text-xl text-gray-400 mt-4">Continue à t'entraîner ! 💪</p>
                    @endif
                </div>

                <div class="flex justify-center gap-4">
                    <a href="{{ route('quiz.show', $quiz->id) }}" 
                       class="px-6 py-3 bg-kahoot-blue text-white rounded-lg pixel-font hover:bg-blue-500 transition-colors">
                        RÉESSAYER
                    </a>
                    <a href="{{ route('quiz.index') }}" 
                       class="px-6 py-3 bg-kahoot-pink text-white rounded-lg pixel-font hover:bg-pink-500 transition-colors">
                        AUTRES QUIZ
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@include('footer')
