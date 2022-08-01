@extends('layouts.app')

@section('content')

    {{-- ajouter un anime --}}
    @if (Auth::user() && Auth::user()->role === 'admin')

        {{-- Btn --}}
        <section class="container d-flex justify-content-center pt-5">
            <a href="#Ajouter_anime" class="btn btn-primary col-6" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="Ajouter_anime">Ajouter un anime</a>       
        </section>

        <section id="Ajouter_anime" class="collapse">
            @include('pages/Creation/nouveauxAnimes')
        </section>

    @endif
    
    
    {{-- Display --}}
    <section class="container d-flex flex-column pt-5">
        <h1 class="d-flex justify-content-center bg-secondary">{{$seasonal->seasons}}</h1>

        <div class="d-flex row">
            @foreach ($seasonal->animes as $anime)
            <div class="d-flex flex-column col-4 col-md-3 ">
                <a class="text-decoration-none link-light" href="/les_animes/{{$anime->id}}">
                    <div class="d-flex justify-content-center"><img src="/storage/Animes/photos/{{$anime->images}}" class="w-100" style="height:25vh" alt=""></div>
                    <h5>{{$anime->nom}}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@endsection