<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code'Hoot - Le jeu de code passionnant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../images/logo/code-hoot-noir.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gradient-to-r from-purple-800 to-indigo-900 shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="../images/logo/code-hoot-noir.jpg" alt="Code'Hoot Logo" class="h-10">
                    <h1 class="text-xl font-bold pixel-font text-yellow-300">CODE'HOOT</h1>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex space-x-6">
                    <a href="index.php" class="hover:text-yellow-300 transition-colors pixel-font text-sm">ACCUEIL</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">JOUER</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">CLASSEMENT</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">DÉFIS</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">À PROPOS</a>
                </nav>

                <!-- Bouton menu mobile -->
                <button class="md:hidden focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Menu mobile -->
    <div class="md:hidden hidden bg-gray-800 px-4 py-2">
        <a href="index.php" class="block py-2 hover:text-yellow-300 pixel-font text-sm">ACCUEIL</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">JOUER</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">CLASSEMENT</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">DÉFIS</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">À PROPOS</a>
        <?php if (!isset($_SESSION['user'])): ?>
            <a href="connexion.php" class="block py-2 bg-green-600 hover:bg-green-700 px-3 py-1 rounded pixel-font text-xs text-center mt-2">CONNEXION</a>
            <a href="inscription.php" class="block py-2 bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded pixel-font text-xs text-center">INSCRIPTION</a>
        <?php endif; ?>
    </div>
    </body>
</html>
