@extends('layouts.app')

@section('content')
    
    <section class="pt-5">
        {{-- admin btn --}}
        <div class="d-flex container-fluid justify-content-between pt-5">
            @if (Auth::user() && Auth::user()->role === 'admin')
                <a href="{{ $article->id }}/edit" class="btn btn-primary col-4">Edit</a>
                {!! Form::open(['action' => ['Blog\ArticlesController@destroy', $article->id], 'method' => 'DELETE']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endif
        </div>

    </section>

    <section class="container-fluid d-flex flex-column pt-5">
        
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column col-12 col-lg-10 justify-content-between">
                <h1 class="border shadow_box mb-5 position-relative p-2" style="top: 25%">{{$article->titre}}</h1>
                <h3 class="pt-3">Mise en ligne le: <br> {{$article->created_at}}</h3>
            </div>
            {{-- kana img --}}
            <div class="col-2 d-none d-lg-flex">
                <img src="/storage/deco/kana_megane.png" class="img-fluid" style="height:30vh" alt="">
            </div>
        </div> 
        <hr class="w-100 p-0 m-0 mb-lg-5 d-none d-lg-block">
        <div class="responsive_bg_img border shadow_box mb-5" style="background-image: url(/storage/Articles/photos/{{$article->images}});height:70vh"></div>
        
        <div class="border shadow_box d-flex flex-column p-5 mb-5">
            <h4>{{$article->presentation}}</h4>
            <hr class="w-50">
            <h5>{{$article->contenu}}</h5>
        </div>
    </section>
@endsection
