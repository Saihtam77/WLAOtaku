@extends('layouts.app')

@section('content')
    <section class="d-flex flex-column align-items-center justify-content-center min-vh-100">

        <div class="col-9 col-lg-4 border shadow_box p-3">
            
            <div class="circle d-flex justify-content-center aling-items-center">
                <img src="/storage/deco/kana_megane.png" class="img-fluid" alt="">
            </div>

            <div class="d-flex flex-column mb-2">
                    <label for="user_name" class="border shadow_box mb-3 ps-2 pt-2"><h2><b>User name</b></h2></label>
                    <h4 class="">{{Auth::user()->name}}</h4>
                    <hr class="w-50 p-0 m-0">

                    <label for="user_mail" class="border shadow_box mb-3 ps-2 pt-2"><h2><b>E-Mail</b></h2></label>
                    <h4 class="">{{Auth::user()->email}}</h4>
                    <hr class="w-50 p-0 m-0">
            </div>
        </div>

    </section>
@endsection