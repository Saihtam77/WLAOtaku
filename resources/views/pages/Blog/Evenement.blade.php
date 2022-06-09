@extends('layouts.app')

@section('content')
    <section class="d-flex container-fluid justify-content-between container mt-5">
        @if (Auth::user())
            <a href="{{$evenement->id}}/edit" class="btn btn-primary col-4">Edit</a>
            {!! Form::open(['action' => ['Blog\EvenementsController@destroy', $evenement->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
        
    </section>

    <section class=" container d-flex flex-column mt-3">
        <div class="d-flex justify-content-center align-items-center position-relative">
            <img src="/storage/Evenements/photos/{{$evenement->images}}" class="w-100" style="height: 50vh" alt="">
            <div class="d-flex flex-column align-items-center justifu-content-center position-absolute bottom-0  hvr-fade w-100">
                <h1><b>{{$evenement->nom}}</b></h1>
            </div>
        </div>

        <div class="d-flex flex-column">
            <h2>{{$evenement->adress}}</h2>
            <h5>Du {{$evenement->date_debut}} au {{$evenement->date_fin}}</h5>

            <p>{{$evenement->presentation}}</p>
            <p>{{$evenement->description}}</p>
        </div>
    </section>
@endsection