@include('header')

<section class="py-12 bg-gradient-to-b from-gray-900 to-gray-800">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 pixel-font text-yellow-300">CLASSEMENT DES JOUEURS</h1>
        <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
            Découvrez les meilleurs joueurs de CodeHoot et consultez leurs performances par période.
        </p>
    </div>
</section>

<section class="py-12">
    <div class="container mx-auto px-4">
        <div class="bg-gray-800 rounded-lg shadow-lg p-8">
            <!-- Filtres temporels -->
            <div class="flex justify-center mb-8">
                <div class="bg-gray-700 rounded-lg p-1 flex space-x-1">
                    <a href="/leaderboard?filter=week" 
                       class="px-6 py-2 rounded-md transition-all pixel-font text-sm {{ $filter === 'week' ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-600' }}">
                        CETTE SEMAINE
                    </a>
                    <a href="/leaderboard?filter=month" 
                       class="px-6 py-2 rounded-md transition-all pixel-font text-sm {{ $filter === 'month' ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-600' }}">
                        CE MOIS
                    </a>
                    <a href="/leaderboard?filter=all" 
                       class="px-6 py-2 rounded-md transition-all pixel-font text-sm {{ $filter === 'all' ? 'bg-yellow-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-600' }}">
                        TOUS LES TEMPS
                    </a>
                </div>
            </div>

            <!-- Tableau du classement -->
            <div class="overflow-x-auto">
                <table class="w-full text-white">
                    <thead class="bg-gray-700 border-b border-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left pixel-font text-yellow-300 text-sm">RANG</th>
                            <th class="px-6 py-4 text-left pixel-font text-yellow-300 text-sm">JOUEUR</th>
                            <th class="px-6 py-4 text-center pixel-font text-yellow-300 text-sm">SCORE TOTAL</th>
                            <th class="px-6 py-4 text-center pixel-font text-yellow-300 text-sm">QUIZ COMPLéTéS</th>
                            <th class="px-6 py-4 text-center pixel-font text-yellow-300 text-sm">MOYENNE</th>
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
                                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-gray-900 font-bold">👑</span>
                                            </div>
                                        @elseif($index === 1)
                                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-gray-900 font-bold">🥈</span>
                                            </div>
                                        @elseif($index === 2)
                                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-gray-900 font-bold">🥉</span>
                                            </div>
                                        @else
                                            <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-gray-900 font-bold">{{ $index + 1 }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4">
                                    <span class="font-semibold text-lg">{{ $user->user_name }}</span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-300 font-bold pixel-font text-sm">
                                        ⭐ {{ number_format($user->total_score) }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-500/20 text-yellow-300 font-bold pixel-font text-sm">
                                        📋 {{ $user->quiz_completed }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 text-center">
                                    <div class="flex items-center justify-center">
                                        <div class="w-16 h-2 bg-gray-600 rounded-full mr-2">
                                            <div class="h-2 bg-yellow-500 rounded-full" 
                                                 style="width: {{ min($user->average, 100) }}%"></div>
                                        </div>
                                        <span class="font-semibold text-yellow-300 pixel-font text-sm">{{ $user->average }}%</span>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                                    <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <span class="text-gray-900 font-bold text-2xl">🏆</span>
                                    </div>
                                    <p class="text-lg pixel-font text-yellow-300">AUCUN JOUEUR TROUVÉ POUR CETTE PÉRIODE</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@include('footer')
