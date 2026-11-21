<nav class="navigation">
    <a href="{{ route('accueil') }}">MediaHub</a>
    <a href="{{ route('publications.index') }}">Contenus</a>
    <a href="{{ route('categories.index') }}">Catégories</a>
    <a href="{{ route('a-propos') }}">À propos</a>

    <div style="float: right;">
        @guest
            <a href="{{ route('connexion') }}">Connexion</a>
            <a href="{{ route('inscription') }}">Inscription</a>
        @endguest

        @auth
            <span style="color: white; margin-right: 10px;">Bonjour, {{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('deconnexion') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline;">Déconnexion</button>
            </form>
        @endauth
    </div>
</nav>