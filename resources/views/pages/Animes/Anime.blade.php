@extends('layouts.app')

@section('content')

    @if (Auth::user() && Auth::user()->role === 'admin')
        <section class="mb-5 pt-5">
            {{-- btn --}}
            <div class="container d-flex justify-content-between">
                <div><a href="{{ $anime->id }}/edit" class="btn btn-primary ">Edit</a></div>
                <div><a href="" class="btn btn-info">Ajouter <br> un nouvelles Episode</a></div>
                {!! Form::open(['action' => ['Animes\AnimesController@destroy', $anime->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>

            <div class="">
                @include('pages/Creation/nouveauxEpisodes')
            </div>

        </section>

    @endif
    
    {{-- Animes info display --}}
    <section class="container d-flex flex-column pt-5 mb-md-5">
        <div class=" d-flex flex-column flex-md-row">

            <div class="d-flex justify-content-center col-md-6">
                <img src="/storage/Animes/photos/{{ $anime->images }}" class="w-100" alt="">
            </div>

            <div class="d-flex flex-column col-md-8 p-3">
               
                    <div class="d-flex text-light">
                        @foreach ($categories as $categorie)
                            <span class="bg-info p-1 me-1">{{$categorie->nom}}</span>
                        @endforeach
                    </div>
                <h1>{{ $anime->nom }}</h1>
                <p>{{ $anime->synopsis }}</p>
            </div>
        </div>
    </section>

    <section class="container-fluid d-flex row">
        <h1 class="mb-3">Liste des episodes</h1>

        <div class="row mb-5 p-2">
            @foreach ($anime->episodes as $episode)
                <a href="/les_episodes/{{$episode->id}}" class="d-flex flex-column col-3 me-3 link-dark text-decoration-none hvr-shrink">
                    <div class="responsive_bg_img" style="background-image: url(/storage/Animes/photos/{{ $anime->images }});height:25vh"></div>
                    <div class="border shadow_box"><h5><b>{{$episode->nom}}</b></h5></div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
