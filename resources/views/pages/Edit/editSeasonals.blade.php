@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column">
        {!! Form::open(["action"=>["Animes\SeasonalsController@update",$seasonals->id],"methodp"=>"PUT","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
            
            <div class="d-flex flex-column form-group">
                {!! Form::label("seasons","Seasonal") !!}
                {!! Form::text("seasons",$seasonals->seasons, ["class"=>"form-control","placeholder"=>"Titre de votre articles"]) !!}
            </div>

            <div class="d-flex form-group mt-5">
                {!! Form::label("date_debut","Du ") !!}
                {!! Form::date("date_debut",$seasonals->date_debut, ["class"=>"form-control me-3"]) !!}

                {!! Form::label("date_fin","au ") !!}
                {!! Form::date("date_fin",$seasonals->date_fin, ["class"=>"form-control"]) !!}
                
            </div>

            <div class="d-flex justify-content-center mt-3">
                {!! Form::submit("Sauvegarder", ["class"=>"btn btn-success col-6"]) !!}
            </div>

        {!! Form::close() !!}
    </section>
@endsection