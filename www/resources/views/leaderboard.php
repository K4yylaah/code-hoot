<?php
require_once "header.php";
?>

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
            <div class="p-8">
                <h1 class="text-4xl font-bold text-center mb-8 gradient-text lucky-font">CLASSEMENT GLOBAL</h1>

                <!-- Filtres -->
                <div class="mb-8 flex flex-wrap gap-4">
                    <button class="px-6 py-2 bg-kahoot-yellow text-gray-900 rounded-lg font-bold pixel-font hover:bg-yellow-400 transition-colors">
                        CETTE SEMAINE
                    </button>
                    <button class="px-6 py-2 bg-gray-700 text-white rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors">
                        CE MOIS
                    </button>
                    <button class="px-6 py-2 bg-gray-700 text-white rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors">
                        TOUT TEMPS
                    </button>
                </div>

                <!-- Tableau de classement -->
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider pixel-font">Rang</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider pixel-font">Joueur</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider pixel-font">Score</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider pixel-font">Quiz Complétés</th>
                                <th class="px-6 py-4 text-left text-xs font-medium text-gray-300 uppercase tracking-wider pixel-font">Moyenne</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            <!-- Top 1 -->
                            <tr class="hover:bg-gray-700 transition-colors bg-kahoot-yellow bg-opacity-10">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="text-2xl text-kahoot-yellow">🏆</span>
                                        <span class="ml-2 font-bold text-kahoot-yellow">1</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-kahoot-yellow flex items-center justify-center">
                                            <span class="text-gray-900 font-bold">ZD</span>
                                        </div>
                                        <span class="ml-4 font-medium text-white">ZaaaaDdddd</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-white font-bold">15,420</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">42</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-kahoot-green font-bold">98%</span>
                                </td>
                            </tr>

                            <!-- Top 2 -->
                            <tr class="hover:bg-gray-700 transition-colors bg-gray-600 bg-opacity-10">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="text-2xl text-gray-400">🥈</span>
                                        <span class="ml-2 font-bold text-gray-400">2</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-kahoot-pink flex items-center justify-center">
                                            <span class="text-white font-bold">AF</span>
                                        </div>
                                        <span class="ml-4 font-medium text-white">AaaaaFf</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-white font-bold">14,280</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">38</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-kahoot-green font-bold">95%</span>
                                </td>
                            </tr>

                            <!-- Top 3 -->
                            <tr class="hover:bg-gray-700 transition-colors bg-yellow-900 bg-opacity-10">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <span class="text-2xl text-yellow-700">🥉</span>
                                        <span class="ml-2 font-bold text-yellow-700">3</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-kahoot-green flex items-center justify-center">
                                            <span class="text-white font-bold">CS</span>
                                        </div>
                                        <span class="ml-4 font-medium text-white">CraaapS</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-white font-bold">13,950</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-white">35</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="text-kahoot-green font-bold">92%</span>
                                </td>
                            </tr>

                            <!-- Autres positions du leaderboard -->
                            <?php
                            $players = [
                                ['azezf', 'EW', 12800, 30, '90%'],
                                ['zaerf', 'MJ', 11500, 28, '88%'],
                                ['azed', 'SK', 10200, 25, '85%'],
                                ['gzfvg', 'DR', 9800, 22, '82%'],
                                ['dazed', 'LP', 9500, 20, '80%']
                            ];

                            foreach ($players as $index => $player) {
                                echo '<tr class="hover:bg-gray-700 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="font-bold text-gray-400">'.($index + 4).'</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 rounded-full bg-gray-700 flex items-center justify-center">
                                                <span class="text-white font-bold">'.$player[1].'</span>
                                            </div>
                                            <span class="ml-4 font-medium text-white">'.$player[0].'</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-white">'.$player[2].'</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-white">'.$player[3].'</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-kahoot-green">'.$player[4].'</span>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px pixel-font" aria-label="Pagination">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                            Précédent
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-kahoot-yellow text-sm font-medium text-gray-900">
                            1
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                            2
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                            3
                        </a>
                        <a href="#" class="relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-700 bg-gray-800 text-sm font-medium text-gray-400 hover:bg-gray-700">
                            Suivant
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once "footer.php";
?>
