@extends('layouts.app')

@section('content')
    <section class="pt-5">
        <div class="d-flex justify-content-center mb-5">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">Résultats des recherches</h1>
            </div>
        </div>
        <div class="row container-fluid">
            @foreach ($animes as $anime)    
            <a href="/les_animes/{{$anime->id}}" class="d-flex flex-column col-6 col-lg-3 mb-3 hvr-shrink text-decoration-none link-dark">
                <div class="d-flex justify-content-center align-items-center responsive_bg_img" style="background-image: url(/storage/Animes/Photos/{{$anime->images}}); height:25vh"></div>
                <div class="border shadow_box"><h5 class="text-center">{{$anime->nom}}</h5></div>
            </a>
            @endforeach
        </div>  
    </section>
@endsection