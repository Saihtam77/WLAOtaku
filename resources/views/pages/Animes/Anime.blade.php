@extends('layouts.app')

@section('content')

    @if (Auth::user() && Auth::user()->role === 'admin')
        <section class="mb-5 pt-5">
            {{-- btn --}}
            <div class="container d-flex justify-content-between">
                <div><a href="{{ $anime->id }}/edit" class="btn btn-primary ">Edit</a></div>
                <div><a href="#form" class="btn btn-info" data-bs-toggle="collapse" aria-expanded="false" aria-controls="form">Ajouter <br> un nouvelles Episode</a></div>
                {!! Form::open(['action' => ['Animes\AnimesController@destroy', $anime->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>

            <div id="form" class="collapse">
                @include('pages/Creation/nouveauxEpisodes')
            </div>

        </section>

    @endif
    
    {{-- Animes info display --}}
    <div class="pt-5"></div>
    <section class="container-fluid d-flex flex-column flex-lg-row pt-3 shadow_box mb-5">

        <div class=" d-flex justif-content-center align-items-center col-lg-6 mb-3">
            <img src="/storage/Animes/photos/{{ $anime->images }}" class="w-100" style="height: 50vh" alt="">
        </div>

        <div class="d-flex flex-column ps-lg-3">
               
            <div class="d-flex text-dark ">
                @foreach ($categories as $categorie)
                    <span class="bg-info p-1 me-2">{{$categorie->nom}}</span>
                @endforeach
            </div>

            {{-- separation --}}
            <div class="d-flex mb-3 mt-3">
                <hr class="container col-12 col-lg-6 m-0">
            </div>

            <div class="d-flex flex-column">
                <h1>{{ $anime->nom }}</h1>
                <h5 class="mb-3"><b>Auteur de l'oeuvre original:</b> {{ $anime->auteur }}</h5>
                <p>{{ $anime->synopsis }}</p>
            </div>
        </div>

    </section>

    <section class="container-fluid d-flex flex-column">
        
        <div class="d-flex justify-content-center mb-5">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">Liste des épisodes</h1>
            </div>
        </div>

        <div class="d-flex x_scroll mb-5 p-2">
            @foreach ($anime->episodes as $episode)
                <a href="/les_episodes/{{$episode->id}}" class="d-flex flex-column col-12 col-lg-3 me-3 link-dark text-decoration-none hvr-shrink">
                    <div class="responsive_bg_img" style="background-image: url(/storage/Animes/photos/{{ $anime->images }});height:25vh"></div>
                    <div class="border shadow_box"><h5><b>{{ $anime->nom }} episode {{$episode->nom}}</b></h5></div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
