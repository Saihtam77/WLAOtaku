@extends('layouts.app')

@section('content')

    @if (Auth::user())
        <section class="mb-5">
            {{-- btn --}}
            <div class="container d-flex justify-content-between mt-5">
                <div><a href="{{ $episode->id }}/edit" class="btn btn-primary ">Edit</a></div>

                {!! Form::open(['action' => ['Animes\EpisodesController@destroy', $episode->id], 'method' => 'DELETE']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </section>
    @endif

    <section class="container d-flex flex-column mt-5">
        <div class="d-flex border p-3 justify-content-center align-items-center">
            <iframe class="w-100" style="min-height: 70vh" src="/storage/Animes/Episodes/video/{{ $episode->video }}" frameborder="0"></iframe>
        </div>

        <h2 class="text-center mt-3">{{ $episode->nom }}</h2>

    </section>

    <section class="d-flex flex-column mt-5">

        <h2 class="text-center">Les autres episodes:</h2>

        <div class="d-flex row justify-content-md-center">
            @foreach ($episodes as $autres_episodes)
                <div class=""><img src="" alt=""></div>
                <h5>{{ $autre_episode }}</h5>
            @endforeach
        </div>
    </section>
@endsection
