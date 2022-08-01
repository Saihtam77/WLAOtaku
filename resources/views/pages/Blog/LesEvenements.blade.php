@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column pt-5">

        <div class="d-flex justify-content-center mb-5">
            <div class="shadow_box col-6 border p-3 text-center">
                <h1>Evenements</h1>
            </div>
        </div>

        @foreach ($evenements as $evenement)
            <a href="/les_evenements/{{$evenement->id}}" class="d-flex mb-3 border link-dark text-decoration-none border shadow_box hvr-shrink">
                
                <div class="responsive_bg_img" style="background-image: url(/storage/Evenements/photos/{{$evenement->images}});height:25vh"></div>
                
                <div class="d-flex flex-column align-items-center justify-content-center col-lg-9 col-8 hvr-sweep-to-right">
                    <div><h3 class="text-center">{{$evenement->nom}}</h3></div>
                    <hr class="w-50 d-none d-lg-block">
                    <div class="d-none d-lg-block"><h6>{{$evenement->presentation}}</h6></div>
                </div>
                
            </a>    
        @endforeach

    </section>
@endsection
