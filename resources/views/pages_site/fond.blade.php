<!DOCTYPE html>
<html>
<head>
    <!-- LP3MI -->
    <link rel='stylesheet' href='/css/mon_style.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('entete')
    <title>@yield('titre')</title>
</head>
<body>
    <nav>
        <ul id="main_nav">
            <li><a href="/membres/vue">Les membres</a></li>
            <li><a href="/creer">Créer un membre</a></li>
            <li><a href="/membres/edit">Modifier un membre</a></li>
            @if(auth()->check())
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Se déconnecter') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            @else
                <li><a href="http://127.0.0.1:8000/home">Se connecter</a></li>
                <li><a href="http://127.0.0.1:8000/register">S'enregistrer</a></li>
            @endif

        </ul>
    </nav>
    <main class="container">
        <section class="titre_contenu">
            @yield('titre_contenu')
        </section>
        <section class="contenu">
            @yield('contenu')
        </section>
        <footer class="pied_page">
            @yield('pied_page')
        </footer>
    </main>
</body>
</html>
