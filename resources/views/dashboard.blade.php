@extends('layouts.app')

@section('content')
    <section class="container mt-5">

        <h1 class="d-flex justify-content-center mb-5">Dashboard</h1>

        <div class="d-flex row justify-content-center h-75 text-dark">
        {{-- evenements card --}}
            <div class="card mb-5 col-md-5 me-md-5">
                <img class="card-img-top" src="..." style="height: 25vh" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Ajouter un nouvel Evenements</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route("nouvelEvenement")}}" class="btn btn-primary">Create</a>
                </div>
            </div>
        {{-- articles card --}}
            <div class="card mb-5 col-md-5">
                <img class="card-img-top" src="..." style="height: 25vh" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Ajouter un nouvel Article</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route("nouvelArticle")}}" class="btn btn-primary">Create</a>
                </div>
            </div>
        {{-- seasonal card --}}
            <div class="card mb-5 col-md-5 me-md-5">
                <img class="card-img-top" src="..." style="height: 25vh" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Ajouter une nouvel seasonal</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{route("newSeasonal")}}" class="btn btn-primary">Create</a>
                </div>
            </div>

        {{-- Anime hors seasonal card --}}
            <div class="card mb-5 col-md-5">
                <img class="card-img-top" src="..." style="height: 25vh" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Ajouter un anime hors seasonal</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="{{route("nouvelAnime_HS")}}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>

    </section>
@endsection