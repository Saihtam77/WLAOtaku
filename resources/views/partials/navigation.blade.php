@guest
    <nav class="d-flex flex-column" style="overflow: auto">

        <h1 class="p-5 mb-5 text-center">Menu</h1>

        <div class="d-flex flex-column align-items-center mb-5 p-3">
            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('accueil') }}">
                <img src="/storage/deco/home.png" class="img-fluids col-2" alt="icone accueil">
                <h3 class="d-flex align-items-center text-center m-0">Accueil</h3>
            </a>

            <hr class="w-75 bg-light">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesAnimes') }}">
                <img src="/storage/deco/saihtama.png" class="img-fluids col-2" alt="icone anime">
                <h3 class="d-flex align-items-center text-center m-0">Liste des animes</h3>
            </a>

            <hr class="w-75 bg-light">
            
            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesArticles') }}">
                <img src="/storage/deco/article.png" class="img-fluids col-2" alt="icone articles">
                <h3 class="d-flex align-items-center text-center m-0">Les articles</h3>
            </a>

            <hr class="w-75 bg-light">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesEvenements') }}">
                <img src="/storage/deco/event.png" class="img-fluids col-2" alt="icone événements">
                <h3 class="d-flex align-items-center text-center m-0">Les évenements</h3>
            </a>

            <hr class="w-75 bg-light">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesSeasonals') }}">
                <img src="/storage/deco/season.png" class="img-fluids col-2" alt="icone saisons">
                <h3 class="d-flex align-items-center text-center m-0">Les seasonals</h3>
            </a>
        </div>

        <div class="d-flex flex-column align-items-center mt-5 p-3">
            <a class="text-decoration-none hvr-grow link-light" href="{{ route('login') }}">
                <h3 class="text-center">Se connecter</h3>
            </a>
            <hr class="w-75 bg-light">
            <a class="text-decoration-none hvr-grow link-light" href="{{ route('register') }}">
                <h3 class="text-center">S'enregister</h3>
            </a>
        </div>

    </nav>
@endguest


@auth
    <nav class="d-flex flex-column">

        <h1 class="p-5 mb-5 text-center">Menu</h1>

        <div class="d-flex flex-column align-items-center mb-5 p-3">
            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('accueil') }}">
                <img src="/storage/deco/home.png" class="img-fluids col-2" alt="icone accueil">
                <h3 class="d-flex align-items-center text-center m-0">Accueil</h3>
            </a>

            <hr class="w-75 bg-light">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesAnimes') }}">
                <img src="/storage/deco/saihtama.png" class="img-fluids col-2" alt="icone anime">
                <h3 class="d-flex align-items-center text-center m-0">Liste des animes</h3>
            </a>

            <hr class="w-75 bg-light">
            
            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesArticles') }}">
                <img src="/storage/deco/article.png" class="img-fluids col-2" alt="icone articles">
                <h3 class="d-flex align-items-center text-center m-0">Les articles</h3>
            </a>

            <hr class="w-75 bg-light">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesEvenements') }}">
                <img src="/storage/deco/event.png" class="img-fluids col-2" alt="icone événements">
                <h3 class="d-flex align-items-center text-center m-0">Les évenements</h3>
            </a>

            <hr class="w-75 bg-light">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesSeasonals') }}">
                <img src="/storage/deco/season.png" class="img-fluids col-2" alt="icone saisons">
                <h3 class="d-flex align-items-center text-center m-0">Les seasonals</h3>
            </a>
        </div>

        <div class="d-flex flex-column align-items-center mt-5 p-3">

            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('LesSeasonals') }}">
                <img src="/storage/deco/user.png" class="img-fluids col-2" alt="icone saisons">
                <h3 class="d-flex align-items-center text-center m-0">Profile</h3>
            </a>
            <hr class="w-75 bg-light">

            @if (Auth::user()->role === 'admin')
            <a class=" d-flex justify-content-center text-decoration-none hvr-grow link-light" href="{{ route('Dashboard') }}">
                <img src="/storage/deco/user.png" class="img-fluids col-2" alt="icone saisons">
                <h3 class="d-flex align-items-center text-center m-0">Dasboard</h3>
            </a>
                <hr class="w-75 bg-light">
            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();"
                    class="text-decoration-none hvr-grow link-light">
                    <h3 class="text-center">Log out</h3>
                </a>
            </form>  
        </div>




    </nav>
@endauth
