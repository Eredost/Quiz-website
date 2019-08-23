<header class="container__header">
    <h1 class="header__logo--big"><a href="{{ route("home-page") }}" class="header__logo--no-underline">O'Quiz</a></h1>
    <nav class="header__nav">
        <ul class="nav__links">
            <li class="nav__link"><a href="{{ route("home-page") }}" class="nav__link--blue active">Accueil</a></li>
            <li class="nav__link"><a href="{{ route("tags-page") }}" class="nav__link--blue">Sujets</a></li>

            @if (App\Utils\UserSession::isConnected())

                <li class="nav__link"><a href="{{ route("profile-page") }}" class="nav__link--blue">Profil</a></li>
                <li class="nav__link"><a href="{{ route("logout-page") }}" class="nav__link--blue">Se deconnecter</a></li>

            @else

                <li class="nav__link"><a href="{{ route("signin-page") }}" class="nav__link--blue">Se connecter</a></li>
                <li class="nav__link"><a href="{{ route("signup-page") }}" class="nav__link--blue">S'inscrire</a></li>

            @endif
        </ul>
    </nav>
</header>
