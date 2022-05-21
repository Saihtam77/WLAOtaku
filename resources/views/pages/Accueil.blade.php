@extends('layouts.app')

@section('content')
    {{-- carousel --}}
    <section class="d-flex justify-content-center">
        <div id="carouselExampleDark" class="carousel carousel-dark slide container-fluid container-md"
            data-bs-ride="carousel">
            {{-- indicator --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            {{-- inner --}}
            <div class="carousel-inner w-100">
                {{-- Slide de depart --}}
                <div class="carousel-item position-relative active w-100" data-bs-interval="10000">
                    <div style="height:50vh; background-color:#fad867"
                        class="d-flex justify-content-center align-items-center">
                        <h1>EVENEMENTS</h1>
                    </div>
                    <div class="position-absolute hvr-fade w-100 d-flex flex-column align-items-center p-5 bottom-0">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                {{-- Affichage des evenements --}}
                @foreach ($evenements as $evenement)
                    <div class="carousel-item position-relative w-100" data-bs-interval="10000">
                        <div style="height:50vh ">
                            <img src="/storage/Evenements/photos/{{ $evenement->images }}" class="d-block w-100 h-100" alt="...">
                        </div>
                        <div class="position-absolute hvr-fade w-100 d-flex flex-column align-items-center p-5 bottom-0"
                            style="z-index:4">
                            <a href="/les_evenements/{{$evenement->id}}" class="text-decoration-none link-dark">
                                <h4><b>{{ $evenement->nom}}</b></h4>
                                <p>{{ $evenement->presentation }}</p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- controller --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </section>

    {{-- grid slider des episode --}}
    <section class="container postion-relative mt-3" style="overflow-x: auto; overflow-y:hidden">

        <div class="d-flex justify-content-md-center align-items-center">
            <div class="d-flex flex-column col-4 col-md-2 me-3">
                <img src="/storage/test/1129086.png" class="w-100" style="height:15vh" alt="">
                <div>
                    <p>azeaeae</p>
                </div>
            </div>

            <div class="d-flex flex-column col-4 col-md-2 me-3">
                <img src="/storage/test/1129086.png" class="w-100" style="height:15vh" alt="">
                <div>
                    <p>azeaeae</p>
                </div>
            </div>

            <div class="d-flex flex-column col-4 col-md-2 me-3">
                <img src="/storage/test/1129086.png" class="w-100" style="height:15vh" alt="">
                <div>
                    <p>azeaeae</p>
                </div>
            </div>

            <div class="d-flex flex-column col-4 col-md-2 me-3">
                <img src="/storage/test/1129086.png" class="w-100" style="height:15vh" alt="">
                <div>
                    <p>azeaeae</p>
                </div>
            </div>
        </div>

    </section>
    {{-- Seasonal --}}
    <section class=" d-flex justify-content-md-center container-fluid mt-3" style="overflow-x: auto">

        <div class="card col-6 col-md-4 me-3" style="width: 18rem;">
            <img src="..." class="card-img-top" class="w-100" style="height: 20vh" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card col-6 col-md-4 me-3" style="width: 18rem;">
            <img src="..." class="card-img-top" class="w-100" style="height: 20vh" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card col-6 col-md-4 me-3" style="width: 18rem;">
            <img src="..." class="card-img-top" class="w-100" style="height: 20vh" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="card col-6 col-md-4 me-3" style="width: 18rem;">
            <img src="..." class="card-img-top" class="w-100" style="height: 20vh" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

    </section>
    {{-- Article --}}
    <section class="container-fluid d-flex mt-5" style="overflow-x:auto; overflow-y:hidden">

        @foreach ($articles as $article)
            <div class="col-6 position-relative me-3">
                <div class="d-flex justify-content-center align-items-center overflow-hidden">
                    <img src="/storage/Articles/Photos/{{ $article->images }}" class="w-100" style="height: 30vh" alt="">
                </div>
                <div class="position-absolute hvr-fade w-100 d-flex flex-column align-items-center bottom-0">
                    <a href="" class="btn col-6">
                        <h5><b>{{ $article->titre }}</b></h5>
                    </a>
                </div>
            </div>
        @endforeach


    </section>
@endsection
