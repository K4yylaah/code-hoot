<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code'Hoot - Le jeu de code passionnant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../images/logo/code-hoot-noir.jpg" />
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<body class="bg-gray-900 text-white">
    <header class="bg-gradient-to-r from-purple-800 to-indigo-900 shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <img src="../images/logo/code-hoot-noir.jpg" alt="Code'Hoot Logo" class="h-10">
                    <h1 class="text-xl font-bold pixel-font text-yellow-300">CODE'HOOT</h1>
                </div>
                <nav class="hidden md:flex space-x-6 items-center">
                    <a href="index.php" class="hover:text-yellow-300 transition-colors pixel-font text-sm">ACCUEIL</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">JOUER</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">CLASSEMENT</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">DEFIS</a>
                    <a href="#" class="hover:text-yellow-300 transition-colors pixel-font text-sm">A PROPOS</a>
                    <?php if (!isset($_SESSION['user'])): ?>
                    <a href="connexion.php" class="px-3 py-1 rounded pixel-font text-xs"><i
                            class="fas fa-user mr-1 text-xs"></i></a>
                    <?php endif; ?>
                </nav>
                <button id="menu-toggle" class="md:hidden focus:outline-none">
                    <div class="w-8 h-8 flex flex-col justify-center items-center">
                        <span class="block w-6 h-0.5 bg-yellow-300 mb-1 transition-all duration-300"></span>
                        <span class="block w-6 h-0.5 bg-yellow-300 mb-1 transition-all duration-300"></span>
                        <span class="block w-6 h-0.5 bg-yellow-300 transition-all duration-300"></span>
                    </div>
                </button>
            </div>
        </div>
    </header>
    <div id="mobile-menu" class="md:hidden hidden bg-gray-800 px-4 py-2">
        <a href="index.php" class="block py-2 hover:text-yellow-300 pixel-font text-sm">ACCUEIL</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">JOUER</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">CLASSEMENT</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">DÉFIS</a>
        <a href="#" class="block py-2 hover:text-yellow-300 pixel-font text-sm">À PROPOS</a>
        <?php if (!isset($_SESSION['user'])): ?>
        <a href="connexion.php" class="block py-2 py-1 rounded pixel-font text-xs text-center mt-2"><i
                class="fas fa-user mr-1 text-xs"></i></a>
        <?php endif; ?>
    </div>
    <script>
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        const spans = this.querySelectorAll('span');
        spans.forEach((span, index) => {
            if (menu.classList.contains('hidden')) {
                span.style.transform = 'none';
                span.style.opacity = '1';
                span.style.width = '1.5rem';
            } else {
                if (index === 0) {
                    span.style.transform = 'rotate(45deg) translate(4px, 4px)';
                } else if (index === 1) {
                    span.style.opacity = '0';
                } else if (index === 2) {
                    span.style.transform = 'rotate(-45deg) translate(4px, -4px)';
                }
            }
        });
    });
    </script>
</body>

</html>