<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code'Hoot - Le jeu de code passionnant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="<?php echo url('images/logo/code-hoot-noir.jpg'); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .pixel-font {
            font-family: 'Press Start 2P', cursive;
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gradient-to-r from-purple-800 to-indigo-900 shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <img src="<?php echo url('images/logo/code-hoot-noir.jpg'); ?>" alt="Code'Hoot Logo" class="h-10">
                    <h1 class="text-xl font-bold pixel-font text-yellow-300">CODE'HOOT</h1>
                </div>
                <nav class="hidden md:flex space-x-6 items-center">
                    <a href="<?php echo url('/'); ?>" class="hover:text-yellow-300 transition-colors pixel-font text-sm">ACCUEIL</a>
                    <a href="<?php echo url('/play'); ?>" class="hover:text-yellow-300 transition-colors pixel-font text-sm">JOUER</a>
                    <a href="<?php echo url('/leaderboard'); ?>" class="hover:text-yellow-300 transition-colors pixel-font text-sm">CLASSEMENT</a>
                    <a href="<?php echo url('/challenges'); ?>" class="hover:text-yellow-300 transition-colors pixel-font text-sm">DEFIS</a>
                    <a href="<?php echo url('/about'); ?>" class="hover:text-yellow-300 transition-colors pixel-font text-sm">A PROPOS</a>
                    <?php if (!isset($_SESSION['user'])) { ?>
                        <a href="<?php echo url('/login'); ?>" class="px-3 py-1 rounded pixel-font text-xs flex items-center"><i class="fas fa-user mr-1 text-xs"></i> CONNEXION</a>
                    <?php } else { ?>
                        <a href="<?php echo url('/account'); ?>" class="px-3 py-1 rounded pixel-font text-xs flex items-center"><i class="fas fa-user mr-1 text-xs"></i> MON COMPTE</a>
                    <?php } ?>
                </nav>
                <button id="menu-toggle" class="md:hidden focus:outline-none">
                    <i class="fas fa-bars text-yellow-300 text-xl"></i>
                </button>
            </div>
        </div>
    </header>
    <div id="mobile-menu" class="md:hidden hidden bg-gray-800 px-4 py-2">
        <a href="<?php echo url('/'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">ACCUEIL</a>
        <a href="<?php echo url('/play'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">JOUER</a>
        <a href="<?php echo url('/leaderboard'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">CLASSEMENT</a>
        <a href="<?php echo url('/challenges'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">DEFIS</a>
        <a href="<?php echo url('/about'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">A PROPOS</a>
        <?php if (!isset($_SESSION['user'])) { ?>
            <a href="<?php echo url('/login'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">CONNEXION</a>
        <?php } else { ?>
            <a href="<?php echo url('/account'); ?>" class="block py-2 hover:text-yellow-300 pixel-font text-sm">MON COMPTE</a>
        <?php } ?>
    </div>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            const icon = this.querySelector('i');
            if (menu.classList.contains('hidden')) {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            } else {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            }
        });
    </script>
