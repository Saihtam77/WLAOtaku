@extends('layouts.app')

@section('content')
    <section class="container min-vh-100 d-flex flex-column justify-content-center">

        <h1 class="d-flex justify-content-center pt-5">Dashboard</h1>

        {{-- separation --}}
        <div class="d-flex justify-content-center mb-5">
            <hr class="container m-0">
        </div>

        <div class="d-flex row justify-content-center h-75 text-dark">
        {{-- evenements card --}}
            <div class="card mb-5 col-md-5 me-md-5">
                <div class="card-body">
                  <h5 class="card-title"><b>Ajouter un nouvel Evenements</b></h5>
    
                  <a href="{{route("nouvelEvenement")}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
            
        {{-- articles card --}}
            <div class="card mb-5 col-md-5">
               
                <div class="card-body">
                  <h5 class="card-title"><b>Ajouter un nouvel Article</b></h5>
    
                  <a href="{{route("nouvelArticle")}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        {{-- seasonal card --}}
            <div class="card mb-5 col-md-5 me-md-5">
                <div class="card-body">
                <h5 class="card-title"><b>Ajouter une nouvel seasonal</b></h5>

                <a href="{{route("newSeasonal")}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>

        {{-- Anime hors seasonal card --}}
            <div class="card mb-5 col-md-5">
                <div class="card-body">
                <h5 class="card-title"><b>Ajouter un anime hors seasonal</b></h5>

                <a href="{{route("nouvelAnime_HS")}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        {{-- Nouvelle catégories --}}
            <div class="card mb-5 col-md-5">
                <div class="card-body">
                <h5 class="card-title"><b>Ajouter une nouvelle catégories</b></h5>

                <a href="{{route("nouvelCategorie")}}" class="btn btn-primary">Ajouter</a>
                </div>
            </div>
        </div>

    </section>
@endsection