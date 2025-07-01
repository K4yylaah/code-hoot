<footer class="bg-gradient-to-r from-purple-900 to-indigo-950 text-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 border-b border-indigo-700 pb-8 mb-8">
            <!-- Section À propos -->
            <div>
                <h3 class="text-yellow-300 pixel-font text-lg mb-4">CODE'HOOT</h3>
                <p class="text-sm mb-4"></p>
            </div>

            <!-- Liens rapides -->
            <div>
                <h3 class="text-yellow-300 pixel-font text-lg mb-4">LIENS</h3>
                <ul class="space-y-2">
                    <li><a href="index.php" class="text-gray-300 hover:text-yellow-300 text-sm">Accueil</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-yellow-300 pixel-font text-lg mb-4">CONTACT</h3>
                <address class="not-italic text-sm">
                    <p>Email: codehoot@alwaysdata.net</p>
                    <p>Support: codehoot@alwaysdata.net</p>
                </address>
            </div>
        </div>

        <!-- Copyright -->
        <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-400">
            <p>© <?php echo date('Y'); ?> Code'Hoot. Tous droits réservés.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="<?php echo url('Mentions-legales'); ?>" class="hover:text-yellow-300">Mentions légales</a>
                <a href="<?php echo url('confidentialite'); ?>" class="hover:text-yellow-300">Confidentialité</a>
                <a href="<?php echo url('cgu'); ?>" class="hover:text-yellow-300">CGU</a>
            </div>
        </div>
    </div>
</footer>   
</body>
</html>