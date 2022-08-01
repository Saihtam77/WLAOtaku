@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column justify-content-center min-vh-100">
        {!! Form::open(['action' => 'Animes\CategoriesController@store', 'method' => 'post', 'enctype' => 'multipart/form-data', 'class' => 'd-flex flex-column text-light']) !!}

        <div class="d-flex flex-column form-group">
            {!! Form::label('nom', 'Nom') !!}
            {!! Form::text('nom', '', ['class' => 'form-control', 'placeholder' => 'Nom']) !!}
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit('Ajouter', ['class' => 'btn btn-success col-6']) !!}
        </div>

        {!! Form::close() !!}
    </section>
@endsection
