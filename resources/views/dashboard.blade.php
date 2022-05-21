@extends('layouts.app')

@section('content')
    <section class="container vh-100 justify-content-center align-items-center">

        <h1 class="d-flex justify-content-center">Dashboard</h1>

        <div class="d-flex h-75 align-items-center justify-content-center">
        {{-- evenements card --}}
            <div class="card me-5" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Ajouter un nouvel Evenements</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route("nouvelEvenement")}}" class="btn btn-primary">Create</a>
                </div>
            </div>
        {{-- articles card --}}
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Ajouter un nouvel Article</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{route("nouvelArticle")}}" class="btn btn-primary">Create</a>
                </div>
            </div>
        </div>

    </section>
@endsection