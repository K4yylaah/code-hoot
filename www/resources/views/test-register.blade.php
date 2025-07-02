<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Test Register</title>
</head>
<body>
    <h1>Test d'inscription</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('register.process') }}" method="POST">
        @csrf
        <div>
            <label>Nom:</label>
            <input type="text" name="name" value="Test User" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="test@edu.esiee-it.fr" required>
        </div>
        <div>
            <label>Mot de passe:</label>
            <input type="password" name="password" value="password123" required>
        </div>
        <div>
            <label>Confirmer:</label>
            <input type="password" name="password_confirmation" value="password123" required>
        </div>
        <div>
            <input type="checkbox" name="terms" value="1" checked required>
            <label>J'accepte les conditions</label>
        </div>
        <button type="submit">S'inscrire</button>
    </form>

    <p>Token CSRF: {{ csrf_token() }}</p>
    <p>Session ID: {{ session()->getId() }}</p>
</body>
</html>
