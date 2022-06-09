@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column">

        @foreach ($articles as $article)
            
            <div class="d-flex border mb-3 mt-5">
                <div class="col-5 col-md-4"><img src="/storage/Articles/photos/{{ $article->images }}"
                        class="w-100" style="height:25vh" alt=""></div>
                <a href="/les_articles/{{ $article->id }}"
                    class="col-7 col-md-8 p-5 d-flex flex-column align-items-center hvr-fade text-decoration-none link-dark">

                    <h3><b>{{ $article->titre}}</b></h3>
                    <h4>{{ $article->presentation }}</h4>

                </a>
            </div>
            
        @endforeach

    </section>
@endsection
