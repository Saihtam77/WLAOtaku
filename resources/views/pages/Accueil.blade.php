@extends('layouts.app')


@section('style')
    <link rel="stylesheet" href="{{ asset('css/accueil_style.css') }}">
@endsection


@section('content')
    {{-- Title --}}
    <section class="container p-5">
        <a href="{{route("accueil")}}" 
            class="d-flex justify-content-center align-items-center w-100 shadow_box link-dark border text-decoration-none hvr-grow me-5">
            <h1 class="display-3 text-center"><b>WLAOtaku</b></h1>
        </a>
    </section>

    {{-- Les Evenements --}}
    <section class="container-fluid d-flex justify-content-center align-items-end p-0 m-0 mt-5 mt-lg-3">

        {{-- img toru --}}
        <div class="d-flex align-items-end col-3 d-none d-lg-block">
            <img src="/storage/deco/toru_wow.png" class="img-fluid rotated_y h-100" alt="">
        </div>
        {{-- carousel des evenements --}}
        <div id="eventCarousel" class=" col-12 col-lg-6 border carousel carousel-dark slide shadow_box" data-bs-ride="carousel">


            {{-- indicator --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#eventCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>

            {{-- inner --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex justify-content-center align-items-center p-5 hvr-shutter-out-vertical"
                        style="height:50vh; background-color:orange">
                        <a href="{{ route('LesEvenements') }}" class="p-5 text-decoration-none link-dark">
                            <h1 class="display-3 text-center"><b>Évenements</b></h1>
                            <hr class="">
                            <h1>Decouvrez ici l'actualité et les nouveautée de la communauté et de ses acteur</h1>
                        </a>
                    </div>
                </div>

                @foreach ($evenements as $evenement)
                    <div class="carousel-item position-relative">
                        <a href="/les_evenements/{{ $evenement->id }}" class="text-decoration-none link-dark">
                            <div class="carousel_img"
                                style="background-image: url(/storage/Evenements/photos/{{ $evenement->images }})"></div>
                            <div
                                class="carousel_text d-flex justify-content-center align-items-center w-100 p-5 hvr-bounce-to-top">
                                <h1><b>{{ $evenement->nom }}</b></h1>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            {{-- button --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#eventCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
        {{-- img toru --}}
        <div class="d-flex align-items-end col-3 d-none d-lg-block">
            <img src="/storage/deco/toru_wow.png" class="img-fluid h-100" alt="">
        </div>

    </section>

    {{-- img kana --}}
    <div class="d-flex justify-content-center d-block d-lg-none"><img src="/storage/deco/kana_lock.png"
            class="col-6 col-lg-3" alt="">
    </div>

    {{-- separation --}}
    <div class="d-flex justify-content-center">
        <hr class="container m-0">
    </div>

    {{-- Les recents episodes --}}
    <section class="mt-5 container-fluid d-flex flex-column mb-5">
        <div class="d-flex justify-content-center mb-3">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">Recent episodes</h1>
            </div>
        </div>

        <div class="d-flex x_scroll p-5">
            @foreach ($animes as $anime)
                @foreach ($anime->episodes as $episode)
                    <a href="/les_episodes/{{ $episode->id }}"
                        class="card_box d-flex flex-column col-12 col-lg-3  link-dark text-decoration-none hvr-shrink me-5">
                        <div class="card_img" style="background-image: url(/storage/Animes/photos/{{ $anime->images }})">
                        </div>
                        <h4 class="border"><b>{{ $anime->nom }} {{ $episode->nom }}</b></h4>
                    </a>
                @endforeach
            @endforeach
        </div>
    </section>

    {{-- separation --}}
    <div class="d-flex justify-content-center">
        <hr class="container m-0">
    </div>

    {{-- Les seasonal --}}
    <section class="mt-5 container-fluid d-flex flex-column m-0 p-0 mb-5">
        <div class="d-flex justify-content-center mb-5">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">Les Seasonals</h1>
            </div>
        </div>
        <div id="seasonalCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div
                        class="seasonalCarousel_first_slide d-flex justify-content-center p-5 align-items-center hvr-shutter-out-vertical">
                        <a href="{{ route('LesSeasonals') }}" class=" text-decoration-none link-dark">

                            @foreach ($seasonals as $seasonal)
                                <h1 class="display-4 text-center"><b>Seasonal {{ $seasonal->seasons }}</b></h1>
                            @endforeach
                            <h3 class="d-none d-lg-block">Decouvrez ici les nouveaux animes de cette saison</h3>

                        </a>
                    </div>
                </div>

                @foreach ($seasonals as $seasonal)
                    @foreach ($seasonal->animes as $anime)
                        <div class="carousel-item">

                            <div class="position-relative">
                                <div class="seasonalCarousel_img"
                                    style="background-image: url(/storage/Animes/photos/{{ $anime->images }})">
                                </div>
                                <a href="/les_animes/{{ $anime->id }}"
                                    class="seasonalCarousel_text d-flex flex-column align-items-center justify-content-center link-dark text-decoration-none hvr-shutter-out-vertical">

                                    <h1 class="display-4 text-center"><b>{{ $anime->nom }}</b></h1>

                                </a>
                            </div>

                        </div>
                    @endforeach
                @endforeach

            </div>

            {{-- button --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#seasonalCarousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#seasonalCarousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </section>

    {{-- separation --}}
    <div class="d-flex justify-content-center">
        <hr class="container m-0">
    </div>

    {{-- Les article --}}
    <section class="mt-5 container-fluid d-flex flex-column mb-5">

        <div class="d-flex justify-content-center mb-5">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">NEWS</h1>
            </div>
        </div>

        @foreach ($articles as $article)
            <a href="/les_articles/{{ $article->id }}" class="d-flex mb-5 thumb_box text-decoration-none text-dark shadow_box">
                <div class="col-4 col-lg-3 thumb_img"
                    style="background-image: url(/storage/Articles/photos/{{ $article->images }})"></div>
                <div
                    class="d-flex flex-column align-items-center justify-content-center col-8 col-lg-9 p-5 hvr-sweep-to-right border">
                    <h3>{{ $article->titre }}</h3>
                    <h5 class="d-none d-lg-block">{{ $article->presentation }}</h5>
                    <div><button class="btn btn-info d-none d-lg-block">Show more</button></div>

                </div>
            </a>
        @endforeach
    </section>
    
@endsection
