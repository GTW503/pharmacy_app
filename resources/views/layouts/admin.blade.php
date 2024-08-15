<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Pharmacy App')</title>
    <!-- Lien vers le CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/admindash.css') }}">
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2>Admin Panel</h2>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        Tableau de Bord
                    </a>
                </li>
                <li>
                    <a href="{{ route('pharmacies.index') }}" class="{{ request()->is('admin/pharmacies*') ? 'active' : '' }}">
                        Pharmacies
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Déconnexion
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Contenu Principal -->
        <div class="content">
            <header>
                <h1>@yield('title', 'Tableau de Bord')</h1>
            </header>
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
