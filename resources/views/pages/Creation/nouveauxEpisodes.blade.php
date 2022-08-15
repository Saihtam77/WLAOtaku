
<section class="container d-flex flex-column mt-5">
    {!! Form::open(["action"=>"Animes\EpisodesController@store","method"=>"post","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
        
        <div class="d-flex flex-column form-group">
            {!! Form::label("nom","Numero de l'épisode") !!}
            {!! Form::number("nom","", ["class"=>"form-control"]) !!}
        </div>

        <div class="d-flex flex-column mt-3">
            {!! Form::label("video","Video de l'episode") !!}
            {!! Form::file("video", ["class"=>"form-control"]) !!}
        </div>

        {!! Form::hidden("animes_id", $anime->id) !!}

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit("Ajouter", ["class"=>"btn btn-success col-6"]) !!}
        </div>
        
    {!! Form::close() !!}
</section>
