@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column">
        {!! Form::open(["action"=>"Blog\ArticlesController@store","methode"=>"post","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
            
            <div class="d-flex flex-column form-group">
                {!! Form::label("titre","Titre") !!}
                {!! Form::text("titre","", ["class"=>"form-control","placeholder"=>"Titre de l'article"]) !!}
            </div>

            <div class="d-flex flex-column form-group">
                {!! Form::label("presentation","Presentation") !!}
                {!! Form::text("presentation","", ["class"=>"form-control","placeholder"=>"Rapide presentation"]) !!}

                {!! Form::label("contenu","Redigez-ici") !!}
                {!! Form::textarea("contenu","", ["class"=>"form-control","placeholder"=>"De quoi voulez vous parler ?"]) !!}
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! Form::file("images", ["class"=>"form-control"]) !!}
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! Form::submit("Ajouter", ["class"=>"btn btn-success col-6"]) !!}
            </div>
            
        {!! Form::close() !!}
    </section>
@endsection