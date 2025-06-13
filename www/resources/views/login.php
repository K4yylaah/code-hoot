<?php
require_once "header.php";
?>

<main class="flex flex-col items-center justify-center min-h-[calc(100vh-120px)] py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center mb-8 gradient-text lucky-font">CONNEXION</h2>

                <form action="<?php echo url('/login'); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">EMAIL</label>
                        <input type="email" id="email" name="email" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white"
                               placeholder="votre@email.com">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">MOT DE PASSE</label>
                        <input type="password" id="password" name="password" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white"
                               placeholder="••••••••">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="text-sm">
                            <a href="<?php echo url('/forgot-password'); ?>" class="font-medium text-kahoot-yellow hover:text-kahoot-pink pixel-font">MOT DE PASSE OUBLIÉ ?</a>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-gray-900 bg-kahoot-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahoot-yellow pixel-font transition-colors">
                            SE CONNECTER
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400 pixel-font">
                        PAS ENCORE DE COMPTE ?
                        <a href="<?php echo url('/register'); ?>" class="font-medium text-kahoot-green hover:text-kahoot-pink">
                            INSCRIVEZ-VOUS
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
