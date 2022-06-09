
<section class="container d-flex flex-column">
    {!! Form::open(["action"=>"Animes\SaisonsController@store","method"=>"post","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
        
        <div class="d-flex flex-column form-group">
            {!! Form::label("nom","Nom") !!}
            {!! Form::text("nom","", ["class"=>"form-control","placeholder"=>"Nom de la saison"]) !!}
        </div>


        <div class="d-flex flex-column form-group">
            {!! Form::label("synopsis","Synopsis") !!}
            {!! Form::textarea("synopsis","", ["class"=>"form-control","placeholder"=>"Synopsis de cette saison ?"]) !!}
        </div>

        <div class="d-flex justify-content-center mt-3">
            {!! Form::file("images", ["class"=>"form-control"]) !!}
        </div>

        {!! Form::hidden("animes_id", $anime->id) !!}

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit("Ajouter", ["class"=>"btn btn-success col-6"]) !!}
        </div>
        
    {!! Form::close() !!}
</section>
