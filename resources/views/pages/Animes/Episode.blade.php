@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('css/episode_style.css') }}">
@endsection
@section('content')

    @if (Auth::user() && Auth::user()->role === 'admin')
        <section class="mb-5 pt-5">
            {{-- btn --}}
            <div class="container d-flex justify-content-between pt-5">
                <div><a href="{{ $episode->id }}/edit" class="btn btn-primary ">Edit</a></div>

                {!! Form::open(['action' => ['Animes\EpisodesController@destroy', $episode->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </section>
    @endif

    <section class="container d-flex flex-column pt-5 justify-content-center mb-5">

        <div class="d-flex justify-content-center align-items-center col-12">
            <iframe src="/storage/Animes/Episodes/video/{{ $episode->video }}" frameborder="0"></iframe>
        </div>

        <h2 class="text-center mt-3">{{ $anime->nom }} épisode{{ $episode->nom }}</h2>
    </section>

    <section class="d-flex flex-column mb-3">

        <div class="d-flex justify-content-center mb-5">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1 class="">Les autres épisodes</h1>
            </div>
        </div>

        <div class="d-flex x_scroll mb-3 p-2">
            @foreach ($episodes as $autre_episode)
            
                <a href="/les_episodes/{{$autre_episode->id}}" class="d-flex flex-column col-12 col-lg-3 me-3 link-dark text-decoration-none hvr-shrink">
                    <div class="responsive_bg_img" style="background-image: url(/storage/Animes/photos/{{ $anime->images }});height:25vh"></div>
                    <div class="border shadow_box"><h5><b>{{ $anime->nom }} épisode {{$autre_episode->nom}}</b></h5></div>
                </a>
                
            @endforeach
        </div>
    </section>
@endsection
