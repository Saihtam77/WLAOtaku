@extends('layouts.app')

@section('content')

    @if (Auth::user())
        <section class="mb-5">
            {{-- btn --}}
            <div class="container d-flex justify-content-between mt-5">
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
    <section class="container d-flex flex-column mb-md-5">
        <div class=" d-flex flex-column flex-md-row">

            <div class="d-flex justify-content-center col-md-6">
                <img src="/storage/Animes/photos/{{ $anime->images }}" class="w-100" alt="">
            </div>

            <div class="d-flex flex-column col-md-8 p-3">
                <h1>{{ $anime->nom }}</h1>
                <p>{{ $anime->synopsis }}</p>
            </div>
        </div>
    </section>

    <section class="container-fluid d-flex row">
        <h1 class="mb-3">Liste des episode</h1>
        @foreach ($episodes as $episode)
            <a href="/les_episodes/{{$episode->id}}/" class="d-flex flex-column col-5 col-md-3 mb-3 me-3 link-light">
                <div class=""><img src="/storage/Animes/photos/{{ $anime->images }}" class="img-fluid" alt=""></div>
                <h3>{{$episode->nom}}</h3>
            </a>
        @endforeach
    </section>
@endsection
