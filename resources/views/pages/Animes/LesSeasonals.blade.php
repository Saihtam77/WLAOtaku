@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column container mt-5 p-5">
        <h1>Les seasonal</h1>

        @foreach ($seasonals as $seasonal)
            <div class="d-flex flex-column mt-5">

                <div class="d-flex justify-content-between mb-5">
                    <a class="link-dark" href="/les_seasonals/{{ $seasonal->id }}">
                        <h2>{{ $seasonal->seasons }}</h2>
                    </a>

                    <div class="d-flex">
                        @if (Auth::user())
                            <a href="les_seasonals/{{ $seasonal->id }}/edit" class="btn btn-primary ">Edit</a>
                            {!! Form::open(['action' => ['Animes\SeasonalsController@destroy', $seasonal->id], 'method' => 'DELETE']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>

                <div class="d-flex row">
                    @foreach ($seasonal->animes as $anime)
                        
                        <a href="les_animes/{{ $anime->id }}" class="link-light text-decoration-none col-4 col-md-3">

                            <img src="/storage/Animes/photos/{{ $anime->images }}" style="" class="w-100"
                                alt="">
                            <h5>{{ $anime->nom }}</h5>

                        </a>
                        
                    @endforeach
                </div>
            </div>
        @endforeach

    </section>
@endsection
