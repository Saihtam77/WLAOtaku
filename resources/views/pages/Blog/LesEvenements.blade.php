@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column">

        @foreach ($evenements as $evenement)
            <div class="d-flex border mb-3 mt-5">
                <div class="col-5 col-md-4"><img src="/storage/Evenements/photos/{{ $evenement->images }}"
                        class="w-100" style="height:25vh" alt=""></div>
                <a href="les_evenements/{{ $evenement->id }}"
                    class="col-7 col-md-8 p-5 d-flex flex-column align-items-center hvr-fade text-decoration-none link-light">

                    <h3><b>{{ $evenement->nom }}</b></h3>
                    <h4>{{ $evenement->presentation }}</h4>

                </a>
            </div>
        @endforeach
    </section>
@endsection
