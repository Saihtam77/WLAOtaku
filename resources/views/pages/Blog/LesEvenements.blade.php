@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column">

        @foreach ($evenements as $evenement)
            <div class="d-flex mt-3 border">
                <div class="col-3 col-md-4">
                    <img class="img-fluid" src="/storage/Evenements/photos/{{$evenement->images}}" alt="">
                </div>
                <div class="d-flex flex-column align-items-center col-9 col-md-8 p-5">
                    <h2>{{$evenement->nom}}</h2>
                    <p>{{$evenement->presentation}}</p>
                </div>
            </div>
        @endforeach
    </section>
@endsection 