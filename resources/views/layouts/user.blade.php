<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - @yield('title', 'Pharmacy App')</title>
</head>
<body>
    <header>
        <h1>Pharmacy App</h1>
        <nav>
            <a href="{{ route('home') }}">Accueil</a>
            <a href="{{ route('cart.index') }}">Panier</a>
            @if(Auth::check())
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
            @else
                <a href="{{ route('login') }}">Connexion</a>
            @endif
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
