@extends('layouts.app')

@section('content')
    <section class="d-flex container-fluid justify-content-between">
        @if (Auth::user())
            <a href="{{$evenement->id}}/edit" class="btn btn-primary">Edit</a>
            {!! Form::open(["action"=>"Blog\EvenementsController@destroy",$evenement->id,"methode"=>"DELETE"]) !!}
                {!! Form::submit("Delete", ["class"=>"btn btn-danger"]) !!}
            {!! Form::close() !!}  
        @endif
        
    </section>

    <section class="d-flex flex-column">
        <div class="overflow-hidden d-flex justify-content-center align-items-center position-relative" style="height: 40vh">
            <img class="w-100" src="/storage/Evenements/photos/{{$evenement->images}}" alt="">
        </div>
        <div class="position-absolute hvr-fade w-100 d-flex flex-column align-items-center justify-content-center bottom-0">
            <h2>{{$evenement->nom}}</h2>
        </div>
    </section>
@endsection