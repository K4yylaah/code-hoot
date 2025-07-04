<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Code'Hoot - Le jeu de code passionnant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ url('../public/favicon.ico') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .pixel-font {
            font-family: 'Press Start 2P', cursive;
        }
        
        .gradient-text {
            background: linear-gradient(45deg, #f59e0b, #ec4899, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .lucky-font {
            font-family: 'Press Start 2P', cursive;
            text-shadow: 2px 2px 0px rgba(0,0,0,0.5);
        }
        
        .pixel-border {
            border: 3px solid #f59e0b;
            border-radius: 0;
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.3);
        }
        
        .kahoot-yellow { color: #f59e0b; }
        .kahoot-pink { color: #ec4899; }
        .kahoot-green { color: #10b981; }
        
        .bg-kahoot-yellow { background-color: #f59e0b; }
        .bg-kahoot-pink { background-color: #ec4899; }
        .bg-kahoot-green { background-color: #10b981; }
        
        .hover\:bg-yellow-400:hover { background-color: #fbbf24; }
        .hover\:bg-pink-500:hover { background-color: #ec4899; }
        .hover\:bg-green-500:hover { background-color: #10b981; }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <header class="bg-gradient-to-r from-purple-800 to-indigo-900 shadow-lg">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <img src="{{ url('../public/favicon.ico') }}" alt="Code'Hoot Logo" class="h-10">
                    <h1 class="text-xl font-bold pixel-font text-yellow-300">CODE'HOOT</h1>
                </div>
                <nav class="hidden md:flex space-x-6 items-center">
                    <a href="{{ url('/') }}" class="hover:text-yellow-300 transition-colors pixel-font text-sm">ACCUEIL</a>
                    <a href="{{ url('/quiz') }}" class="hover:text-yellow-300 transition-colors pixel-font text-sm">JOUER</a>
                    <a href="{{ url('/leaderboard') }}" class="hover:text-yellow-300 transition-colors pixel-font text-sm">CLASSEMENT</a>
                    <a href="{{ url('/challenges') }}" class="hover:text-yellow-300 transition-colors pixel-font text-sm">DEFIS</a>
                    <a href="{{ url('/about') }}" class="hover:text-yellow-300 transition-colors pixel-font text-sm">A PROPOS</a>
                    @auth
                        <div class="relative" id="user-menu">
                            <button 
                                type="button" 
                                class="flex items-center pixel-font text-xs text-yellow-300 hover:text-yellow-200 transition-colors cursor-pointer"
                                id="user-menu-button"
                                aria-expanded="false"
                            >
                                <i class="fas fa-user mr-1"></i>{{ Auth::user()->name }}
                                <i class="fas fa-chevron-down ml-1 text-xs"></i>
                            </button>
                            
                            <!-- Menu déroulant -->
                            <div 
                                class="absolute right-0 mt-2 w-48 bg-gray-800 rounded-md shadow-lg border border-gray-700 z-50 hidden"
                                id="user-dropdown"
                            >
                                <div class="py-1">
                                    <a 
                                        href="{{ url('/account') }}" 
                                        class="block px-4 py-2 text-sm pixel-font text-white hover:bg-purple-700 transition-colors"
                                    >
                                        <i class="fas fa-user-cog mr-2"></i>MON COMPTE
                                    </a>
                                    <hr class="border-gray-700 my-1">
                                    <form action="{{ route('logout') }}" method="POST" class="block">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="w-full text-left px-4 py-2 text-sm pixel-font text-white hover:bg-red-600 transition-colors"
                                        >
                                            <i class="fas fa-sign-out-alt mr-2"></i>DECONNEXION
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ url('/login') }}" class="px-3 py-1 rounded pixel-font text-xs flex items-center hover:bg-purple-700 transition-colors">
                            <i class="fas fa-user mr-1 text-xs"></i> CONNEXION
                        </a>
                    @endauth
                </nav>
                <button id="menu-toggle" class="md:hidden focus:outline-none">
                    <i class="fas fa-bars text-yellow-300 text-xl"></i>
                </button>
            </div>
        </div>
    </header>
    <div id="mobile-menu" class="md:hidden hidden bg-gray-800 px-4 py-2">
        <a href="{{ url('/') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">ACCUEIL</a>
        <a href="{{ url('/quiz') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">JOUER</a>
        <a href="{{ url('/leaderboard') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">CLASSEMENT</a>
        <a href="{{ url('/challenges') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">DEFIS</a>
        <a href="{{ url('/about') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">A PROPOS</a>
        @auth
            <div class="border-t border-gray-700 pt-2 mt-2">
                <div class="py-2 text-yellow-300 pixel-font text-xs">
                    <i class="fas fa-user mr-1"></i>{{ Auth::user()->name }}
                </div>
                <a href="{{ url('/account') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">MON COMPTE</a>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="block py-2 hover:text-red-400 pixel-font text-sm w-full text-left">
                        <i class="fas fa-sign-out-alt mr-1"></i>DECONNEXION
                    </button>
                </form>
            </div>
        @else
            <a href="{{ url('/login') }}" class="block py-2 hover:text-yellow-300 pixel-font text-sm">CONNEXION</a>
        @endauth
    </div>

    <script>
        // Menu mobile toggle
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

        // Menu utilisateur déroulant
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');
        
        if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                userDropdown.classList.toggle('hidden');
                
                // Mettre à jour l'icône de la flèche
                const chevron = userMenuButton.querySelector('.fa-chevron-down, .fa-chevron-up');
                if (userDropdown.classList.contains('hidden')) {
                    chevron.classList.remove('fa-chevron-up');
                    chevron.classList.add('fa-chevron-down');
                } else {
                    chevron.classList.remove('fa-chevron-down');
                    chevron.classList.add('fa-chevron-up');
                }
            });

            // Fermer le menu si on clique ailleurs
            document.addEventListener('click', function(e) {
                if (!document.getElementById('user-menu').contains(e.target)) {
                    userDropdown.classList.add('hidden');
                    const chevron = userMenuButton.querySelector('.fa-chevron-up, .fa-chevron-down');
                    chevron.classList.remove('fa-chevron-up');
                    chevron.classList.add('fa-chevron-down');
                }
            });
        }
    </script>
