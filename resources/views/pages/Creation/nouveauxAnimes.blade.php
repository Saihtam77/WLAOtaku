
<section class="container d-flex flex-column">
    {!! Form::open(["action"=>"Animes\AnimesController@store","method"=>"post","enctype"=>"multipart/form-data","class"=>"d-flex flex-column"]) !!}
        
        <div class="d-flex flex-column form-group">
            {!! Form::label("nom","Nom") !!}
            {!! Form::text("nom","", ["class"=>"form-control","placeholder"=>"Nom de l'anime"]) !!}

            {!! Form::label("auteur","Auteur") !!}
            {!! Form::text("auteur","", ["class"=>"form-control","placeholder"=>"L'auteur de l'oeuvre original"]) !!}
        </div>

        <div class="d-flex flex-column form-group col-6">
            {!! Form::label("date_diffusion","Date de debut diffusion") !!}
            {!! Form::date("date_diffusion","", ["class"=>"form-control"]) !!}
        </div>

        <div class="d-flex flex-column form-group col-6">
            {!! Form::label('categories', 'Categories') !!}
            <select name="categories[]" id="Categories" multiple="multiple" class="form-control">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-flex flex-column form-group">
            {!! Form::label("synopsis","Synopsis") !!}
            {!! Form::textarea("synopsis","", ["class"=>"form-control","placeholder"=>"De quoi voulez vous parler ?"]) !!}
        </div>

        <div class="d-flex flex-column mt-3">
            {!! Form::label("images","Images") !!}
            {!! Form::file("images", ["class"=>"form-control"]) !!}
        </div>

        {!! Form::hidden("seasonals_id", $seasonal->id) !!}

        <div class="d-flex justify-content-center mt-3">
            {!! Form::submit("Ajouter", ["class"=>"btn btn-success col-6"]) !!}
        </div>
        
    {!! Form::close() !!}
</section>
