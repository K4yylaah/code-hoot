@include('header')

<div id="gameContainer" class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700 mt-10">
    <div class="p-8">
        <div id="quizContent"></div>
    </div>
</div>

@include('footer')

<script>
document.addEventListener("DOMContentLoaded", () => {
    const questions = @json($quiz->questions);
    const quizId = @json($quiz->id);
    const userId = @json(auth()->id() ?? null);
    let currentIndex = 0;
    let score = 0;
    let timer;
    const timeLimit = 30;

    console.log('Questions chargées:', questions); // Debug
    console.log('Quiz ID:', quizId);
    console.log('User ID:', userId);

    function renderQuestion(index) {
        const question = questions[index];
        const answers = question.reponses;

        console.log('Question actuelle:', question); // Debug
        console.log('Réponses:', answers); // Debug

        let html = `
            <div id="question-${index}" class="question-container">
                <div class="mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-kahoot-yellow pixel-font">QUESTION ${index + 1}/${questions.length}</h2>
                        <div class="text-gray-300 pixel-font">
                            TEMPS RESTANT: <span class="time-remaining">${timeLimit}</span>s
                        </div>
                    </div>
                    <div class="bg-gray-700 p-6 rounded-lg mb-6 border border-gray-600">
                        <p class="text-xl font-medium text-white">${question.énoncé}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        `;

        answers.forEach((answer, i) => {
            // Conversion explicite en string pour éviter les problèmes
            const isCorrect = answer.est_correcte === 1 || answer.est_correcte === '1' || answer.est_correcte === true;
            html += `
                <button class="answer-option bg-gray-700 hover:bg-gray-600 border-2 border-gray-600 hover:border-kahoot-yellow p-4 rounded-lg text-left transition-all"
                        data-correct="${isCorrect ? 'true' : 'false'}"
                        data-answer-id="${answer.id}">
                    <span class="block text-lg font-medium text-white">${i + 1}. ${answer.contenu}</span>
                </button>
            `;
        });

        html += `
                </div>
                <div class="mt-10 flex justify-between">
                    <div class="text-gray-400 pixel-font">
                        Score: <span class="text-kahoot-yellow">${score}/${questions.length}</span>
                    </div>
                </div>
            </div>
        `;

        document.getElementById('quizContent').innerHTML = html;
        
        // Désactiver tous les boutons après le premier clic
        let answered = false;
        
        document.querySelectorAll('.answer-option').forEach(btn => {
            btn.addEventListener('click', (e) => {
                if (answered) return; // Empêcher les clics multiples
                answered = true;
                
                clearInterval(timer);
                
                // Désactiver tous les boutons
                document.querySelectorAll('.answer-option').forEach(button => {
                    button.disabled = true;
                    button.style.pointerEvents = 'none';
                });
                
                // Vérifier la réponse
                const isCorrect = btn.getAttribute('data-correct') === 'true';
                
                console.log('Réponse cliquée:', btn.querySelector('span').textContent);
                console.log('Est correcte:', isCorrect);
                console.log('Data-correct value:', btn.getAttribute('data-correct'));
                
                // Feedback visuel
                if (isCorrect) {
                    btn.classList.add('bg-green-600', 'border-green-400');
                    btn.classList.remove('bg-gray-700', 'border-gray-600');
                    score++;
                    console.log('✓ Bonne réponse ! Score:', score);
                } else {
                    btn.classList.add('bg-red-600', 'border-red-400');
                    btn.classList.remove('bg-gray-700', 'border-gray-600');
                    
                    // Montrer la bonne réponse
                    document.querySelectorAll('.answer-option').forEach(button => {
                        if (button.getAttribute('data-correct') === 'true') {
                            button.classList.add('bg-green-600', 'border-green-400');
                            button.classList.remove('bg-gray-700', 'border-gray-600');
                        }
                    });
                    console.log('✗ Mauvaise réponse ! Score:', score);
                }
                
                // Passer à la question suivante après 2 secondes
                setTimeout(() => {
                    nextQuestion();
                }, 2000);
            });
        });

        startTimer();
    }

    function startTimer() {
        let seconds = timeLimit;
        const display = document.querySelector('.time-remaining');

        timer = setInterval(() => {
            seconds--;
            if (display) {
                display.textContent = seconds;
                
                // Changer la couleur si le temps est presque écoulé
                if (seconds <= 10) {
                    display.parentElement.classList.add('text-red-400');
                } else {
                    display.parentElement.classList.remove('text-red-400');
                }
            }
            
            if (seconds <= 0) {
                clearInterval(timer);
                console.log('⏰ Temps écoulé ! Score:', score);
                
                // Montrer la bonne réponse quand le temps est écoulé
                document.querySelectorAll('.answer-option').forEach(button => {
                    button.disabled = true;
                    button.style.pointerEvents = 'none';
                    if (button.getAttribute('data-correct') === 'true') {
                        button.classList.add('bg-green-600', 'border-green-400');
                        button.classList.remove('bg-gray-700', 'border-gray-600');
                    }
                });
                
                setTimeout(() => {
                    nextQuestion();
                }, 2000);
            }
        }, 1000);
    }

    function nextQuestion() {
        currentIndex++;
        console.log('Passage à la question', currentIndex + 1, '- Score actuel:', score);
        
        if (currentIndex < questions.length) {
            renderQuestion(currentIndex);
        } else {
            showResults();
        }
    }

    // Fonction pour sauvegarder le score
    async function saveScore(finalScore) {
        if (!userId) {
            console.log('Utilisateur non connecté, score non sauvegardé');
            return;
        }

        try {
            const response = await fetch('/api/save-score', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    quiz_id: quizId,
                    user_id: userId,
                    score: finalScore,
                    quiz_completes: questions.length
                })
            });

            if (response.ok) {
                const data = await response.json();
                console.log('Score sauvegardé avec succès:', data);
            } else {
                console.error('Erreur lors de la sauvegarde du score:', response.statusText);
            }
        } catch (error) {
            console.error('Erreur lors de la sauvegarde du score:', error);
        }
    }

    function showResults() {
        const percent = Math.round((score / questions.length) * 100);
        let message = "Continuez à vous entraîner !";
        let emoji = "📚";
        
        if (percent === 100) {
            message = "Parfait ! Excellent travail !";
            emoji = "🏆";
        } else if (percent >= 80) {
            message = "Très bien joué !";
            emoji = "🎉";
        } else if (percent >= 60) {
            message = "Bien joué !";
            emoji = "👍";
        } else if (percent >= 40) {
            message = "Pas mal, mais vous pouvez faire mieux !";
            emoji = "💪";
        }

        console.log('🎯 Quiz terminé ! Score final:', score, '/', questions.length, `(${percent}%)`);

        // Sauvegarder le score dans la base de données
        saveScore(score);

        document.getElementById('quizContent').innerHTML = `
            <div id="resultsScreen" class="text-center space-y-8">
                <h2 class="text-4xl font-bold mb-4 bg-gradient-to-r from-kahoot-yellow to-kahoot-pink bg-clip-text text-transparent lucky-font">
                    ${emoji} RÉSULTATS ${emoji}
                </h2>
                <div class="bg-gray-700 p-8 rounded-lg border border-gray-600">
                    <p class="text-xl mb-6 text-gray-300">Votre score final</p>
                    <div class="flex justify-center items-center gap-4 mb-6">
                        <div class="w-32 h-32 bg-gradient-to-br from-kahoot-green to-green-600 rounded-full flex items-center justify-center shadow-lg">
                            <span id="finalScore" class="text-5xl font-bold text-white">${score}</span>
                        </div>
                        <span class="text-3xl font-medium text-gray-300">/ ${questions.length}</span>
                    </div>
                    <div class="text-center space-y-2">
                        <p class="text-3xl font-bold text-kahoot-yellow">${percent}%</p>
                        <p id="performanceText" class="text-lg font-medium text-gray-300">${message}</p>
                        ${userId ? '<p class="text-sm text-green-400 mt-4">✓ Score sauvegardé</p>' : '<p class="text-sm text-yellow-400 mt-4">⚠️ Connectez-vous pour sauvegarder vos scores</p>'}
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button id="restartQuiz" onclick="location.reload()" class="px-8 py-4 bg-kahoot-pink hover:bg-pink-500 text-white rounded-lg font-bold pixel-font transition-all transform hover:scale-105">
                        🔄 REJOUER
                    </button>
                    <a href="{{ route('quiz.index') }}" class="px-8 py-4 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-bold pixel-font transition-all transform hover:scale-105">
                        📚 RETOUR AUX QUIZ
                    </a>
                </div>
            </div>
        `;
    }

    // Démarrer le quiz
    if (questions && questions.length > 0) {
        renderQuestion(currentIndex);
    } else {
        document.getElementById('quizContent').innerHTML = `
            <div class="text-center text-red-400">
                <h2 class="text-2xl font-bold mb-4">Erreur</h2>
                <p>Aucune question trouvée pour ce quiz.</p>
                <a href="{{ route('quiz.index') }}" class="mt-4 inline-block px-6 py-3 bg-gray-700 text-white rounded-lg">
                    Retour aux quiz
                </a>
            </div>
        `;
    }
});
</script>
