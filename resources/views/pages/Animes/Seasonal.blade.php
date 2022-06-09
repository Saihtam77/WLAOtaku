@extends('layouts.app')

@section('content')
    {{-- Btn --}}
    <section class="container d-flex justify-content-between mt-5">
        
        @if (Auth::user())
            <a href="{{ $seasonal->id }}/edit" class="btn btn-primary ">Edit</a>
            <a href="" class="btn btn-info">Ajouter un anime</a>
            {!! Form::open(['action' => ['Animes\SeasonalsController@destroy', $seasonal->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
                
    </section>

    {{-- ajouter un anime --}}
    @if (Auth::user())
        @include('pages/Creation/nouveauxAnimes')
    @endif
    
    {{-- Display --}}
    <section class="container d-flex flex-column mt-5">
        <h1 class="d-flex justify-content-center bg-secondary">{{$seasonal->seasons}}</h1>

        <div class="d-flex row" style="background-color: #adadad">
            <h2 class="">Les animes de cette seasonal: </h2>
            @foreach ($animes as $anime)
            <div class="d-flex flex-column col-4 col-md-3 ">
                <a href="/les_animes/{{$anime->id}}">
                    <div class="d-flex justify-content-center"><img src="/storage/Animes/photos/{{$anime->images}}" class="w-100" style="height:25vh" alt=""></div>
                    <h5>{{$anime->nom}}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@endsection