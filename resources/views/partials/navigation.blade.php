@guest
    <nav class="d-flex flex-column" style="overflow: auto">

        <h1 class="p-5 mb-5 text-center">Menu</h1>

        <div class="d-flex flex-column align-items-center mb-5 p-3">
            <a class="text-decoration-none link-light" href="{{ route('accueil') }}">
                <h3 class="text-center">Accueil</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesAnimes') }}">
                <h3 class="text-center">Liste des animes</h3>
            </a>
            <hr class="w-75 bg-light">
            
            <a class="text-decoration-none link-light" href="{{ route('LesArticles') }}">
                <h3 class="text-center">Les articles</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesEvenements') }}">
                <h3 class="text-center">Les evenements</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesSeasonals') }}">
                <h3 class="text-center">Les Seasonals</h3>
            </a>
        </div>

        <div class="d-flex flex-column align-items-center mt-5 p-3">
            <a class="text-decoration-none link-light" href="{{ route('login') }}">
                <h3 class="text-center">Login</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('register') }}">
                <h3 class="text-center">Register</h3>
            </a>
        </div>

    </nav>
@endguest


@auth
    <nav class="d-flex flex-column">

        <h1 class="p-5 mb-5 text-center">Menu</h1>

        <div class="d-flex flex-column align-items-center mb-5 p-3">
            <a class="text-decoration-none link-light" href="{{ route('accueil') }}">
                <h3 class="text-center">Accueil</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesAnimes') }}">
                <h3 class="text-center">Liste des animes</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesArticles') }}">
                <h3 class="text-center">Les articles</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesEvenements') }}">
                <h3 class="text-center">Les evenements</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none link-light" href="{{ route('LesSeasonals') }}">
                <h3 class="text-center">Les Seasonals</h3>
            </a>
        </div>

        <div class="d-flex flex-column align-items-center mt-5 p-3">

            <a class="text-decoration-none link-light" href="{{route("profil")}}">
                <h3 class="text-center">Profile</h3>
            </a>
            <hr class="w-75 bg-light">

            @if (Auth::user()->role === 'admin')
                <a class="text-decoration-none link-light" href="{{ route('dashboard') }}">
                    <h3 class="text-center">Dashboard</h3>
                </a>
                <hr class="w-75 bg-light">
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();"
                    class="text-decoration-none link-light">
                    <h3 class="text-center">Log out</h3>
                </a>
            </form>
            
        </div>




    </nav>

@endauth
