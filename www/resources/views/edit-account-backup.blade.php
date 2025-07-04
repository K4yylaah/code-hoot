@include('header')

<main class="flex flex-col items-center py-12 px-4 min-h-[calc(100vh-120px)]">
    <div class="w-full max-w-4xl">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border">
            <div class="p-8">
                <h1 class="text-4xl font-bold text-center mb-8 gradient-text lucky-font">MODIFIER MON PROFIL</h1>

                @if ($errors->any())
                <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li class="pixel-font text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('csrf_error'))
                    <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                        <p class="pixel-font text-sm">{{ session('csrf_error') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 p-4 bg-red-500 text-white rounded-lg">
                        <p class="pixel-font text-sm">{{ session('error') }}</p>
                    </div>
                @endif
                
                <form action="{{ route('account.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-6">
                        <!-- Informations générales -->
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4 text-kahoot-yellow pixel-font">INFORMATIONS GÉNÉRALES</h2>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-gray-300 pixel-font mb-2">PSEUDO</label>
                                    <input type="text" name="name" id="name" 
                                           value="{{ old('name', $user->name) }}"
                                           class="w-full px-4 py-3 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow"
                                           required>
                                </div>

                                <div>
                                    <label for="email" class="block text-gray-300 pixel-font mb-2">EMAIL</label>
                                    <input type="email" name="email" id="email" 
                                           value="{{ old('email', $user->email) }}"
                                           class="w-full px-4 py-3 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow"
                                           required>
                                    <p class="mt-1 text-sm text-gray-400 pixel-font">Uniquement les adresses @edu.esiee-it.fr ou @esiee-it.fr</p>
                                </div>
                            </div>
                        </div>

                        <!-- Changement de mot de passe -->
                        <div class="bg-gray-700 rounded-lg p-6">
                            <h2 class="text-xl font-bold mb-4 text-kahoot-yellow pixel-font">CHANGER LE MOT DE PASSE</h2>
                            <p class="text-sm text-gray-400 pixel-font mb-4">Laissez vide si vous ne souhaitez pas changer votre mot de passe</p>
                            
                            <div class="space-y-4">
                                <div>
                                    <label for="current_password" class="block text-gray-300 pixel-font mb-2">MOT DE PASSE ACTUEL</label>
                                    <input type="password" name="current_password" id="current_password" 
                                           class="w-full px-4 py-3 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow"
                                           placeholder="Entrez votre mot de passe actuel">
                                </div>

                                <div>
                                    <label for="new_password" class="block text-gray-300 pixel-font mb-2">NOUVEAU MOT DE PASSE</label>
                                    <input type="password" name="new_password" id="new_password" 
                                           class="w-full px-4 py-3 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow"
                                           placeholder="Minimum 8 caractères">
                                </div>

                                <div>
                                    <label for="new_password_confirmation" class="block text-gray-300 pixel-font mb-2">CONFIRMER LE NOUVEAU MOT DE PASSE</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                                           class="w-full px-4 py-3 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow"
                                           placeholder="Répétez le nouveau mot de passe">
                                </div>
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                    class="flex-1 px-6 py-3 bg-kahoot-green text-white rounded-lg font-bold pixel-font hover:bg-green-500 transition-colors">
                                <i class="fas fa-save mr-2"></i>SAUVEGARDER
                            </button>
                            <a href="{{ route('account.show') }}" 
                               class="flex-1 px-6 py-3 bg-gray-600 text-white rounded-lg font-bold pixel-font hover:bg-gray-500 transition-colors text-center">
                                <i class="fas fa-times mr-2"></i>ANNULER
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@include('footer')
                                    <input type="password" name="current_password" id="current_password"
                                           class="w-full px-4 py-2 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow">
                                </div>

                                <div>
                                    <label for="new_password" class="block text-gray-300 pixel-font mb-2">NOUVEAU MOT DE PASSE</label>
                                    <input type="password" name="new_password" id="new_password"
                                           class="w-full px-4 py-2 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow">
                                </div>

                                <div>
                                    <label for="new_password_confirmation" class="block text-gray-300 pixel-font mb-2">CONFIRMER LE NOUVEAU MOT DE PASSE</label>
                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                           class="w-full px-4 py-2 bg-gray-600 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-kahoot-yellow">
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-4 pt-6">
                            <button type="submit" class="flex-1 px-6 py-3 bg-kahoot-pink text-white rounded-lg font-bold pixel-font hover:bg-pink-500 transition-colors">
                                SAUVEGARDER
                            </button>
                            <a href="{{ route('account.show') }}" class="flex-1 px-6 py-3 bg-gray-700 text-white rounded-lg font-bold pixel-font hover:bg-gray-600 transition-colors text-center">
                                ANNULER
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

