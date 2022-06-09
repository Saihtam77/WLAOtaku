@extends('layouts.app')

@section('content')
    {{-- btn --}}
    <section class="container d-flex justify-content-between mt-5">
        @if (Auth::user())
            <a href="{{ $anime->id }}/edit" class="btn btn-primary ">Edit</a>
            <a href="" class="btn btn-info">Nouvelles saisons</a>
            {!! Form::open(['action' => ['Animes\AnimesController@destroy', $anime->id], 'method' => 'DELETE']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    </section>

    @if (Auth::user())
        @include('pages/Creation/nouvellesSaisons')
    @endif

    <section class="container d-flex flex-column mt-5">
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

    {{-- Les saison --}}
    <section class="d-flex flex-column mt-3">

        <div class="d-flex justify-content-center">
            <h1 class="">Les Saisons</h1>
        </div>
        <div class="d-flex justify-content-md-center row">

            @foreach ($saisons as $saison)
                <a href="/les_saisons/{{$saison->id}}" class="d-flex flex-column col-6 col-md-4 link-light text-decoration-none">
                    <div><img src="/storage/Animes/photos/{{$saison->images}}" class="w-100" style="height: 25vh" alt=""></div>
                    <h5>{{$saison->nom}}</h5>
                </a>
            @endforeach
        </div>
        

    </section>
@endsection
