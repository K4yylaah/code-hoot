@include('header')
<main class="container mx-auto px-4 py-8 max-w-4xl">
    <h1 class="text-3xl font-bold text-yellow-300 mb-8 pixel-font text-center border-b-2 border-purple-500 pb-2">
        MENTIONS LEGALES</h1>

    <div class="bg-gray-800 rounded-lg shadow-lg p-6 legal-content">
        <section class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-3 pixel-font border-b border-purple-500 pb-1">1.
                INFORMATIONS LEGALES</h2>
            <div class="text-gray-300 space-y-2">
                <p><strong>Raison sociale :</strong> Code'Hoot</p>
                <p><strong>Siège social :</strong> 3 Rue Armand Moisant, 75015 Paris</p>
                <p><strong>SIRET :</strong> 000 000 000 00000</p>
                <p><strong>Directeur de publication :</strong> Oujdid Irids, Kahila Saif-Allah, Dubois Matias,
                    Deschaseaux Romain</p>
                <p><strong>Hébergement :</strong> Always Data 222-224 Boulevard Gustave Flaubert, 63000 Clermont-Ferrand
                </p>
            </div>
        </section>

        <section class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-3 pixel-font border-b border-purple-500 pb-1">2. PROPRIETE
                INTELLECTUELLE</h2>
            <p class="text-gray-300">
                Tous les contenus présents sur ce site (textes, images, graphismes, logos, icônes, sons, logiciels,
                etc.) sont la propriété exclusive de Code'Hoot ou de ses partenaires, sauf mention contraire.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-3 pixel-font border-b border-purple-500 pb-1">3. DONNEES
                PERSONNELLES</h2>
            <p class="text-gray-300">
                Conformément au RGPD, nous nous engageons à protéger vos données personnelles. Pour plus d'informations,
                consultez notre <a href="/privacy" class="text-yellow-300 hover:underline">politique de
                    confidentialité</a>.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-3 pixel-font border-b border-purple-500 pb-1">4. COOKIES
            </h2>
            <p class="text-gray-300">
                Ce site utilise des cookies pour améliorer votre expérience. Vous pouvez gérer vos préférences dans les
                paramètres de votre navigateur.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-3 pixel-font border-b border-purple-500 pb-1">5. LIENS
                HYPERTEXTES</h2>
            <p class="text-gray-300">
                Code'Hoot ne peut être tenu responsable des contenus des sites vers lesquels des liens hypertextes sont
                proposés.
            </p>
        </section>

        <section class="mb-8">
            <h2 class="text-xl font-bold text-purple-300 mb-3 pixel-font border-b border-purple-500 pb-1">6. DROIT
                APPLICABLE</h2>
            <p class="text-gray-300">
                Les présentes mentions légales sont régies par le droit français. En cas de litige, les tribunaux
                français seront compétents.
            </p>
        </section>

        <p class="text-gray-400 text-sm mt-10 text-center">
            Dernière mise à jour : <?php echo date('d/m/Y'); ?>
        </p>
    </div>
</main>
@include('footer')