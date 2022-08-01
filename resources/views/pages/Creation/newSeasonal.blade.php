@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column justify-content-center min-vh-100">
        {!! Form::open(['action' => 'Animes\SeasonalsController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'd-flex flex-column text-light']) !!}

        <div class="d-flex flex-column form-group">
            {!! Form::label('seasons', 'Seasonal') !!}
            {!! Form::text('seasons', '', ['class' => 'form-control', 'placeholder' => 'Seasons']) !!}
        </div>

        <div class="d-flex form-group mt-5">
            {!! Form::label('date_debut', 'Du ') !!}
            {!! Form::date('date_debut', '', ['class' => 'form-control me-3']) !!}

            {!! Form::label('date_fin', 'au ') !!}
            {!! Form::date('date_fin', '', ['class' => 'form-control']) !!}

        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit('Ajouter', ['class' => 'btn btn-success col-6']) !!}
        </div>

        {!! Form::close() !!}
    </section>
@endsection
