@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column container mt-5 p-5">
        <h1>Les seasonal</h1>

        @foreach ($seasonals as $seasonal)
            <div class="d-flex flex-column mt-5">
                
                <div class="d-flex justify-content-center">
                    <a href="/les_seasonals/{{$seasonal->id}}">
                        <h2>{{$seasonal->seasons}}</h2>
                    </a>
                </div>

                <div class="d-flex row">
                    @foreach ($animes as $anime)
                        @if ($anime->seasonals_id==$seasonal->id)
                        <a href="les_animes/{{$anime->id}}" class="link-light text-decoration-none col-4 col-md-3">
                            
                                <img src="/storage/Animes/photos/{{$anime->images}}" style="" class="w-100" alt="">
                                <h5>{{$anime->nom}}</h5>
                            
                        </a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach

    </section>
@endsection