@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-lg shadow-2xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white mb-4">
                    <i class="fas fa-trophy text-yellow-500 mr-3"></i>
                    Classement des Joueurs
                </h1>
                <p class="text-gray-400 text-lg">Découvrez les meilleurs joueurs de CodeHoot</p>
            </div>

            <!-- Filtres temporels -->
            <div class="flex justify-center mb-8">
                <div class="bg-gray-700 rounded-lg p-1 flex space-x-1">
                    <a href="/leaderboard?filter=week" 
                       class="px-6 py-2 rounded-md transition-all {{ $filter === 'week' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:text-white hover:bg-gray-600' }}">
                        Cette semaine
                    </a>
                    <a href="/leaderboard?filter=month" 
                       class="px-6 py-2 rounded-md transition-all {{ $filter === 'month' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:text-white hover:bg-gray-600' }}">
                        Ce mois
                    </a>
                    <a href="/leaderboard?filter=all" 
                       class="px-6 py-2 rounded-md transition-all {{ $filter === 'all' ? 'bg-blue-600 text-white' : 'text-gray-300 hover:text-white hover:bg-gray-600' }}">
                        Tous les temps
                    </a>
                </div>
            </div>

            <!-- Tableau du classement -->
            <div class="overflow-x-auto">
                <table class="w-full text-white">
                    <thead class="bg-gray-700 border-b border-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Rang</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Joueur</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-300 uppercase tracking-wider">Score Total</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-300 uppercase tracking-wider">Quiz Complétés</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-300 uppercase tracking-wider">Moyenne</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-600">
                        @forelse($leaderboard as $index => $user)
                            <tr class="hover:bg-gray-700 transition-colors duration-200 
                                {{ $index === 0 ? 'bg-gradient-to-r from-yellow-600/20 to-yellow-500/20' : '' }}
                                {{ $index === 1 ? 'bg-gradient-to-r from-gray-400/20 to-gray-300/20' : '' }}
                                {{ $index === 2 ? 'bg-gradient-to-r from-amber-600/20 to-amber-500/20' : '' }}">
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($index === 0)
                                            <i class="fas fa-crown text-yellow-500 text-xl mr-2"></i>
                                        @elseif($index === 1)
                                            <i class="fas fa-medal text-gray-400 text-xl mr-2"></i>
                                        @elseif($index === 2)
                                            <i class="fas fa-medal text-amber-600 text-xl mr-2"></i>
                                        @else
                                            <span class="w-6 h-6 flex items-center justify-center text-gray-400 font-semibold mr-2">
                                                {{ $index + 1 }}
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-sm mr-3">
                                            {{ substr($user->user_name, 0, 2) }}
                                        </div>
                                        <span class="font-semibold text-lg">{{ $user->user_name }}</span>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-600/20 text-green-400 font-bold">
                                        <i class="fas fa-star mr-1"></i>
                                        {{ number_format($user->total_score) }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-blue-600/20 text-blue-400 font-semibold">
                                        <i class="fas fa-tasks mr-1"></i>
                                        {{ $user->quiz_completed }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center">
                                        <div class="w-16 h-2 bg-gray-600 rounded-full mr-2">
                                            <div class="h-2 bg-gradient-to-r from-green-500 to-blue-500 rounded-full" 
                                                 style="width: {{ min($user->average, 100) }}%"></div>
                                        </div>
                                        <span class="font-semibold text-white">{{ $user->average }}%</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                    <i class="fas fa-trophy text-4xl mb-4"></i>
                                    <p class="text-lg">Aucun joueur trouvé pour cette période</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@include('footer')
