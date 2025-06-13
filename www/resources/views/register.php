<?php
require_once "header.php";
?>

<main class="flex flex-col items-center justify-center min-h-[calc(100vh-120px)] py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center mb-8 gradient-text lucky-font">INSCRIPTION</h2>

                <form action="register_process.php" method="POST" class="space-y-6">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">NOM D'UTILISATEUR</label>
                        <input type="text" id="username" name="username" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white"
                               placeholder="Votre pseudo">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">EMAIL</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white"
                               placeholder="email@edu.esiee-it.fr">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">MOT DE PASSE</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white"
                               placeholder="••••••••">
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">CONFIRMER MOT DE PASSE</label>
                        <input type="password" id="confirm_password" name="confirm_password" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white"
                               placeholder="••••••••">
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                               class="h-4 w-4 text-kahoot-yellow focus:ring-kahoot-yellow border-gray-600 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-300 pixel-font">
                            J'accepte les <a href="terms.php" class="text-kahoot-yellow hover:text-kahoot-pink">conditions d'utilisation</a>
                        </label>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-gray-900 bg-kahoot-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahoot-yellow pixel-font transition-colors">
                            S'INSCRIRE
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400 pixel-font">
                        DÉJÀ INSCRIT ?
                        <a href="login.php" class="font-medium text-kahoot-green hover:text-kahoot-pink">
                            CONNECTEZ-VOUS
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once "footer.php";
?>
