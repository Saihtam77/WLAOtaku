@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column">
        {!! Form::open(['action' => ['Animes\SaisonsController@update',$saison->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'class' => 'd-flex flex-column']) !!}

        <div class="d-flex flex-column form-group">
            {!! Form::label('nom', 'Nom') !!}
            {!! Form::text('nom',$saison->nom, ['class' => 'form-control', 'placeholder' => "Nom de l'anime"]) !!}
        </div>

        <div class="d-flex flex-column form-group">
            {!! Form::label('synopsis', 'Synopsis') !!}
            {!! Form::textarea('synopsis',$saison->synopsis, ['class' => 'form-control', 'placeholder' => 'De quoi voulez vous parler ?']) !!}
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! Form::file('images', ['class' => 'form-control']) !!}
        </div>

        {!! Form::hidden('animes_id', $saison->animes_id) !!}

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit('Ajouter', ['class' => 'btn btn-success col-6']) !!}
        </div>

        {!! Form::close() !!}
    </section>
@endsection
