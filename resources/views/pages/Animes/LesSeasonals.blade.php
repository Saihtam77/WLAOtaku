@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column container pt-5">

        <div class="d-flex justify-content-center mb-3">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">LES SEASONAL</h1>
            </div>
        </div>

        @foreach ($seasonals as $seasonal)
            <div class="d-flex flex-column pt-5">
    
                <div class="d-flex justify-content-between">
                    <div>
                        <a class="text-decoration-none link-dark" href="/les_seasonals/{{$seasonal->id}}">
                            <h3><b>{{$seasonal->seasons}}</b></h3>
                        </a>
                    </div>
                    {{-- admin btns --}}
                    <div class="d-flex align-items-center">
                        <div class="d-flex">

                            @if (Auth::user() && Auth::user()->role === 'admin')
                                <a href="les_seasonals/{{ $seasonal->id }}/edit" class="btn btn-primary ">Edit</a>
                                {!! Form::open(['action' => ['Animes\SeasonalsController@destroy', $seasonal->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endif
                        </div>
                    </div>

                </div>
                {{-- separatioon --}}
                <hr class="w-100 m-0 p-0 mb-5">
                {{-- contents --}}
                <div class="row">
                    @foreach ($seasonal->animes as $anime)
                    <a href="/les_animes/{{$anime->id}}" class="d-flex flex-column col-6 col-lg-3 mb-3 hvr-shrink text-decoration-none link-dark">
                        <div class="d-flex justify-content-center align-items-center responsive_bg_img" style="background-image: url(/storage/Animes/Photos/{{$anime->images}}); height:20vh"></div>
                        <div class="border shadow_box"><h5 class="text-center">{{$anime->nom}}</h5></div>
                    </a>
                    @endforeach
                </div>
            </div>
        @endforeach

    </section>
@endsection
