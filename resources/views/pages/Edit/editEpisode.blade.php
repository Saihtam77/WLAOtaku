@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column mt-5">
        {!! Form::open(['action' => ['Animes\EpisodesController@update', $episode->id], 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'd-flex flex-column']) !!}

        <div class="d-flex flex-column form-group">
            {!! Form::label('nom', 'Nom') !!}
            {!! Form::text('nom', $episode->nom, ['class' => 'form-control', 'placeholder' => "Nom de l'episode"]) !!}
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! Form::file('video', ['class' => 'form-control']) !!}
        </div>

        {!! Form::hidden('saisons_id', $episode->saisons_id) !!}

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit('Ajouter', ['class' => 'btn btn-success col-6']) !!}
        </div>

        {!! Form::close() !!}
    </section>
@endsection
