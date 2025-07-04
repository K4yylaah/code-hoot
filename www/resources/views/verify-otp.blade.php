@include('header')

<main class="flex flex-col items-center justify-center min-h-[calc(100vh-120px)] py-12 px-4">
    <div class="w-full max-w-md">
        <div class="bg-gray-800 rounded-xl shadow-xl overflow-hidden pixel-border">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center mb-8 gradient-text lucky-font">VÉRIFICATION</h2>

                <div class="text-center mb-6">
                    <p class="text-gray-300 pixel-font">Un code de vérification a été envoyé à</p>
                    <p class="text-kahoot-yellow font-medium pixel-font">{{ session('email') }}</p>
                </div>

                <form action="{{ route('verify.otp') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="otp" class="block text-sm font-medium text-gray-300 mb-2 pixel-font">CODE DE VÉRIFICATION</label>
                        <input type="text" id="otp" name="otp" required
                               class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-kahoot-yellow focus:ring-2 focus:ring-kahoot-yellow focus:outline-none text-white text-center text-2xl tracking-widest"
                               placeholder="123456"
                               maxlength="6"
                               pattern="\d{6}">
                    </div>

                    @error('otp')
                    <div class="text-red-500 text-sm pixel-font">
                        {{ $message }}
                    </div>
                    @enderror

                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-gray-900 bg-kahoot-yellow hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-kahoot-yellow pixel-font transition-colors">
                            VÉRIFIER
                        </button>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    <p class="text-sm text-gray-400 pixel-font">
                        Vous n'avez pas reçu le code ?
                        <a href="{{ url('/login') }}" class="font-medium text-kahoot-green hover:text-kahoot-pink">
                            RÉESSAYER
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

@include('footer')
