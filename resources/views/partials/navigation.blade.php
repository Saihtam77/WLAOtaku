@guest
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
        <div class="container-fluid">

            {{-- reseau sociaux --}}
            <section class="d-flex flex-column align-items-center position-fixed col-2 col-md-1 p-2 end-0 top-50">
            <img src="/storage/logos/5a3a185132ceb1.89894673151375675320812609.png" alt="" class="w-50 mb-4">
            <img src="/storage/logos/25231.png" alt="" class="w-50 mb-4">
            <img src="/storage/logos/87390.png" alt="" class="w-50 mb-4">
            </section>

            <a class="navbar-brand" href="{{ route('accueil') }}">Logo</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav container-fluid d-flex flex-column flex-md-row justify-content-md-between">

                    <div class="d-flex flex-column flex-md-row">
                        <a class="nav-link" href="#">Liste des animes</a>
                        <a class="nav-link" href="#">Article</a>
                        <a class="nav-link" href="#">Evenements</a>
                    </div>

                    <div class="d-flex flex-column flex-md-row">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        <a class="nav-link" href="{{ route('register') }}">register</a>
                    </div>

                </div>
            </div>
        </div>
    </nav>
@endguest

@auth
    <nav class="navbar navbar-expand-lg navbar-dark container-fluid" style="background-color: #000814">
                
        <div class="container-fluid">

            {{-- reseau sociaux --}}
            <section class="d-flex flex-column align-items-center position-fixed col-2 col-md-1 p-2 end-0 top-50">
            <img src="/storage/logos/5a3a185132ceb1.89894673151375675320812609.png" alt="" class="w-50 mb-4">
            <img src="/storage/logos/25231.png" alt="" class="w-50 mb-4">
            <img src="/storage/logos/87390.png" alt="" class="w-50 mb-4">
            </section>

            <a class="navbar-brand" href="{{ route('accueil') }}">Logo</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav container-fluid d-flex flex-column flex-md-row justify-content-md-between">

                    <div class="d-flex flex-column flex-md-row">
                        <a class="nav-link" href="{{route("LesAnimes")}}">Liste des animes</a>
                        <a class="nav-link" href="{{route("LesArticles")}}">Les articles</a>
                        <a class="nav-link" href="{{route("LesEvenements")}}">Les evenements</a>
                        <a class="nav-link" href="{{route("LesSeasonals")}}">Les Seasonals</a>
                    </div>

                    <div class="d-flex flex-column flex-md-row">
                        <a class="nav-link" href="#">Profile</a>
                        <a class="nav-link" href="{{route("dashboard")}}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();" class="nav-link">
                                Log out
                            </a>
                        </form>
                        
                    </div>

                </div>
            </div>
        </div>
    </nav> 
@endauth