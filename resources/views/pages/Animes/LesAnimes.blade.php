@extends('layouts.app')

@section('content')

<section class=" container-fluid p-3 d-flex flex-column">
    <div class="d-flex justify-content-center mb-5">
        <div class="shadow_box col-6 border p-3 text-center">
            <h1 class="">Les Animes</h1>
        </div>
    </div>
</section>

{{-- separation --}}
<div class="d-flex justify-content-center mb-5">
    <hr class="container m-0">
</div>


<section class="container-fluid">

    <div class="d-flex ">

        <div class="col-lg-4 d-none d-lg-flex justify-content-end">
            <img src="/storage/deco/kana_soko.png" class="w-50 rotated_y" alt="">
        </div>

        {!! Form::open(["action"=>"Animes\AnimesController@search", "method"=>"get", "class"=>"d-flex form-groupe col-lg-4 col-12 mb-3 align-items-center"]) !!}
            {{ Form::search("search","",["class"=>"form-control","placeholder"=>"Recherche"]); }}
            {!! Form::submit("Recherche", ["class"=>"btn btn-info"]) !!}
        {!! Form::close() !!}

        <div class="col-lg-4 d-none d-lg-flex justify-content-start">
            <img src="/storage/deco/kana_soko.png" class="w-50" alt="">
        </div>
        
    </div>

    {{-- separation --}}
    <div class="d-flex justify-content-center mb-5">
        <hr class="container m-0 d-none d-lg-block ">
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