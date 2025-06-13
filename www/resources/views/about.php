<?php
require_once "header.php";
?>

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)] bg-gray-900">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden border-2 border-gray-700">
            <div class="p-8">
                <h1 class="text-4xl font-bold text-center mb-8 gradient-text lucky-font">À PROPOS DE CODE'HOOT</h1>
                
                <div class="space-y-8">
                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-kahoot-yellow pixel-font">NOTRE MISSION</h2>
                        <p class="text-gray-300 mb-4">
                            Code'Hoot est une plateforme interactive dédiée à l'apprentissage du code de manière ludique et engageante. 
                            Notre mission est de rendre l'apprentissage de la programmation accessible, amusant et social.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-kahoot-pink pixel-font">FONCTIONNALITES</h2>
                        <ul class="list-disc list-inside text-gray-300 space-y-2">
                            <li>Quiz interactifs sur différents langages de programmation</li>
                            <li>Mode multijoueur pour des défis en temps réel</li>
                            <li>Tableaux de classement pour suivre votre progression</li>
                            <li>Création de quiz personnalisés</li>
                            <li>Import/Export de questions en format CSV</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-kahoot-green pixel-font">NOTRE EQUIPE</h2>
                        <p class="text-gray-300 mb-4">
                            Code'Hoot est développé par une équipe passionnée d'étudiants en développement web, 
                            déterminés à créer la meilleure expérience d'apprentissage possible pour la communauté des développeurs.
                        </p>
                    </section>

                    <section>
                        <h2 class="text-2xl font-bold mb-4 text-kahoot-blue pixel-font">CONTACT</h2>
                        <p class="text-gray-300">
                            Pour toute question ou suggestion, n'hésitez pas à nous contacter :
                            <br>
                            Email : contact@codehoot.com
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require_once "footer.php";
?>
