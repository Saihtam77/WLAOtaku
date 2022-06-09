@extends('layouts.app')

@section('content')
    <section class="container d-flex flex-column mt-5">
        <div class="d-flex border p-3 justify-content-center align-items-center">
            <img src="/storage/Animes/Episodes/video/{{$episode->video}}" class="w-100" style="height:50vh" alt="">
        </div>
        
        <h2 class="text-center mt-3">{{$episode->nom}}</h2>
        
    </section>

    <section class="d-flex flex-column mt-5">
        
        <h2 class="text-center">Les autres episodes:</h2>
        
        <div class="d-flex row justify-content-md-center">
            @foreach ($episodes as $autres_episodes)
                <div class=""><img src="" alt=""></div>
                <h5>{{$autre_episode}}</h5>
            @endforeach
        </div>
    </section>
@endsection