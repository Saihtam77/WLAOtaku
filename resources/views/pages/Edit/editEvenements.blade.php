@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column">
        {!! Form::open(["action"=>["Blog\EvenementsController@update",$evenement->id],"method"=>"PUT","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
            
            <div class="d-flex flex-column form-group">
                {!! Form::label("nom","Nom") !!}
                {!! Form::text("nom",$evenement->nom, ["class"=>"form-control","placeholder"=>"Nom de l'évenement"]) !!}
            </div>

            <div class="d-flex form-group mt-5">
                {!! Form::label("date_debut","Du") !!}
                {!! Form::date("date_debut",$evenement->date_debut, ["class"=>"form-control me-3"]) !!}

                {!! Form::label("date_fin","au") !!}
                {!! Form::date("date_fin",$evenement->date_fin, ["class"=>"form-control"]) !!}
                
            </div>

            <div class="d-flex flex-column form-group">
                {!! Form::label("adresse","Lieux du déroulement") !!}
                {!! Form::text("adresse",$evenement->adresse, ["class"=>"form-control","placeholder"=>"Où ce déroule l'evenements?"]) !!}
            </div>

            <div class="d-flex flex-column form-group">
                {!! Form::label("presentation","Presentation") !!}
                {!! Form::text("presentation",$evenement->presentation, ["class"=>"form-control","placeholder"=>"Rapide presentation"]) !!}

                {!! Form::label("description","Description") !!}
                {!! Form::textarea("description",$evenement->description, ["class"=>"form-control","placeholder"=>"Decrivez le contenu de l'évenements"]) !!}
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