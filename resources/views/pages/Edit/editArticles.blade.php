@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column">
        {!! Form::open(["action"=>["Blog\ArticlesController@update",$article->id],"method"=>"PUT","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
            
            <div class="d-flex flex-column form-group">
                {!! Form::label("titre","Titre") !!}
                {!! Form::text("titre",$article->titre, ["class"=>"form-control","placeholder"=>"Titre de votre articles"]) !!}
            </div>

            <div class="d-flex flex-column form-group">
                {!! Form::label("presentation","Presentation") !!}
                <textarea class="form-control" placeholder="Rapide presentation" name="presentation" id="presentation" cols="30" rows="3">
                    {{$article->presentation}}
                </textarea>

                {!! Form::label("contenu","Contenu") !!}
                {!! Form::textarea("contenu",$article->contenu, ["class"=>"form-control","placeholder"=>"Ecrivez ce dont vous voulez parler"]) !!}
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! Form::file("images", ["class"=>"form-control"]) !!}
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! Form::submit("Sauvegarder", ["class"=>"btn btn-success col-6"]) !!}
            </div>

        {!! Form::close() !!}
    </section>
@endsection