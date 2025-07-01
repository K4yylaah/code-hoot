@include('header')
<section class="py-12 bg-gradient-to-b from-gray-900 to-gray-800">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6 pixel-font text-yellow-300">CREEZ DES QUIZ SANS LIMITES</h1>
        <p class="text-lg md:text-xl mb-8 max-w-3xl mx-auto">
            Une plateforme complète pour creer, partager et animer des quiz interactifs avec import/export CSV, gestion d'equipes et bien plus encore.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="<?php echo url('/quiz/create'); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-3 px-6 rounded-lg pixel-font text-sm transition-colors">COMMENCER</a>        </div>
    </div>
</section>
<section class="py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-12 text-center pixel-font text-yellow-300">NOS FONCTIONNALITeS</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-900 font-bold">↓↑</span>
                    </div>
                    <h3 class="text-xl font-bold pixel-font text-yellow-300">IMPORT/EXPORT CSV</h3>
                </div>
                <p>Importez et exportez vos questions en CSV pour une gestion simplifiee de vos quiz.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-900 font-bold">∞</span>
                    </div>
                    <h3 class="text-xl font-bold pixel-font text-yellow-300">SANS LIMITATION</h3>
                </div>
                <p>Pas de limite de participants. Organisez des quiz pour des groupes de toutes tailles.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-900 font-bold">✏️</span>
                    </div>
                    <h3 class="text-xl font-bold pixel-font text-yellow-300">EDITION EN LIGNE</h3>
                </div>
                <p>Modifiez vos questions directement dans l'interface, sans avoir à tout recommencer.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-900 font-bold">🏆</span>
                    </div>
                    <h3 class="text-xl font-bold pixel-font text-yellow-300">MODES DE JEU</h3>
                </div>
                <p>Choisissez entre un mode competitif avec classement ou un mode collaboratif sans pression.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-900 font-bold">🔗</span>
                    </div>
                    <h3 class="text-xl font-bold pixel-font text-yellow-300">PARTAGE FACILE</h3>
                </div>
                <p>Generez des liens personnalises pour partager vos quiz sur toutes les plateformes.</p>
            </div>
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                <div class="flex items-center mb-4">
                    <div class="w-10 h-10 bg-yellow-500 rounded-full flex items-center justify-center mr-3">
                        <span class="text-gray-900 font-bold">🔒</span>
                    </div>
                    <h3 class="text-xl font-bold pixel-font text-yellow-300">SECURITE</h3>
                </div>
                <p>Contrôlez l'accès à vos quiz avec des options de securite avancees.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-gray-800">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-12 text-center pixel-font text-yellow-300">COMMENT ÇA MARCHE ?</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold">1</span>
                </div>
                <h3 class="text-xl font-bold mb-2 pixel-font text-yellow-300">CReEZ VOTRE QUIZ</h3>
                <p>Ajoutez des questions, definissez les paramètres et personnalisez votre quiz.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold">2</span>
                </div>
                <h3 class="text-xl font-bold mb-2 pixel-font text-yellow-300">PARTAGEZ LE LIEN</h3>
                <p>Generez un lien unique ou un QR code pour que vos participants puissent rejoindre le quiz en un clic, depuis n'importe quel appareil.</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-yellow-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold">3</span>
                </div>
                <h3 class="text-xl font-bold mb-2 pixel-font text-yellow-300">LANCER LA SESSION</h3>
                <p>Animez votre quiz en temps reel et consultez les resultats instantanement.</p>
            </div>
        </div>
    </div>
</section>


@include('footer')