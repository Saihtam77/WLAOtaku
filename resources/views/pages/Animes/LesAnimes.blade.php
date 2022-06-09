@extends('layouts.app')

@section('content')
    <section class="d-flex row mt-5 p-5">
        <h1 class="d-flex justify-content-center mb-5">Nos Animes </h1>
        @foreach ($animes as $anime)
        <div class="d-flex flex-column col-4 col-md-3 p-3">
            
            <a href="/les_animes/{{$anime->id}}" class="link-light text-decoration-none">
                <img src="/storage/Animes/photos/{{$anime->images}}" alt="" class="w-100" style="height: 20vh">
                <h5>{{$anime->nom}}</h5>
            </a>
            
        </div>  
        @endforeach
    </section>
@endsection