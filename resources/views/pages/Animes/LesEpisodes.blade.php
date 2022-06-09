@extends('layouts.app')

@section('content')

    {{-- btn --}}
    <section class="container d-flex justify-content-between mt-5">
        @if (Auth::user())
            <a href="{{ $saison->id }}/edit" class="btn btn-primary ">Edit</a>
            <a href="" class="btn btn-info">Ajouter un episode</a>
            {!! Form::open(['action' => ['Animes\SaisonsController@destroy', $saison->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    </section>
    @if (Auth::user())
        @include('pages.Creation.nouveauxEpisodes')
    @endif
    <section class=" container-md d-flex flex-column flex-md-row mt-5">
        <div class="col-md-6">
            <img src="/storage/Animes/photos/{{$saison->images}}" class="w-100" style="height: 50vh" alt="">
        </div>
        <div class="p-3 d-flex flex-column align-items-center">
            <h1>{{$saison->nom}}</h1>
            <p>{{$saison->synopsis}}</p>
        </div>
    </section>


    <section class="d-flex row mt-5 p-5">
        <h1 class="d-flex justify-content-center mb-5">Episode de la saison </h1>
        @foreach ($episodes as $episode)
            <div class="d-flex flex-column col-4 col-md-3 p-3">
                
                <a href="/les_episodes/{{$episode->id}}" class="link-light text-decoration-none">
                    <img src="/storage/Animes/photos/{{$saison->images}}" alt="" class="w-100" style="height: 20vh">
                    <h5>{{$episode->nom}}</h5>
                </a>
                
            </div>  
        @endforeach
    </section>
@endsection