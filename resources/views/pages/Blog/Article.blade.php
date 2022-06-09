@extends('layouts.app')

@section('content')
    
    <section class="d-flex container-fluid justify-content-between mt-5">
        
        @if (Auth::user())
            <a href="{{ $article->id }}/edit" class="btn btn-primary col-4">Edit</a>
            {!! Form::open(['action' => ['Blog\ArticlesController@destroy', $article->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif

    </section>

    <section class="container-fluid d-flex flex-column mt-5">

        <div class="d-flex flex-column">
            <h1 class="text-align-center">{{ $article->titre }}</h1>
            <p>{{ $article->created_at }}</p>
        </div>

        <div class="d-flex flex-column container-fluid">
            <div class="d-flex align-items-center justify-content-center mb-3">
                <img src="/storage/Articles/photos/{{ $article->images }}" class="w-100" style="height:60vh" alt="">
            </div>
            <h5>{{ $article->presentation }}</h5>
            <p>{{ $article->contenu }}</p>
        </div>

    </section>
@endsection
