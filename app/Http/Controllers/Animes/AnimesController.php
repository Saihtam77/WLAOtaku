<?php

namespace App\Http\Controllers\Animes;

use App\Http\Controllers\Controller;
use App\Models\Animes\animes;
use App\Models\Animes\categories;
use App\Models\Animes\episodes;
use Illuminate\Http\Request;

class AnimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = animes::OrderBy("nom")->get();
        return view("pages.Animes.LesAnimes")->with("animes", $animes);
    }

    public function search()
    {
        $search=request()->input('search');

        $animes=animes::where("nom","like","%$search%");

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=categories::OrderBy("nom","desc")->get();
        return view("pages.Creation.nouveauxAnimes_HorsSeasonal")->with("categories",$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*Verification du remplissage des champs requis*/
        $this->validate($request, [

            "nom" => 'required',
            "date_diffusion" => 'required',
            "auteur" => 'required',
            "categories"=>'required', 
            

            "synopsis" => 'required',

            /* image required */
            "images"=>'required|image|mimes:jpg,png,jpeg|max:1999'
        ]);

        /*Créee un identifiant unique pour l'images et la stocke*/
        if ($request->hasFile("images")) {
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension = $request->file('images')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('images')->storeAs('Animes/photos', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        /* Exportation des nouvelles donnée dans la base de donnée */
        $animes = new animes;

        $animes->nom = $request->input('nom');
        $animes->date_diffusion = $request->input('date_diffusion');
        $animes->auteur = $request->input('auteur');

        $animes->synopsis = $request->input('synopsis');

        $animes->seasonals_id = $request->input('seasonals_id');
        
        $animes->images = $fileNameToStore;

        $animes->save();

        $animes->categories()->sync($request->input('categories')); 
        return redirect()->route("LesAnimes")->with('success', 'Nouvel anime ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anime = animes::find($id);
        $categories= animes::find($id)->categories()->OrderBy("nom", "desc")->get(); 
       

        return view("pages.Animes.Anime",[
                "categories"=>$categories,
                "anime"=>$anime,
                
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anime = animes::find($id);
        return view("pages.Edit.editAnimes")->with("anime", $anime);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*Verification du remplissage des champs requis*/
        $this->validate($request, [

            "nom" => 'required',
            "date_diffusion" => 'required',
            "auteur" => 'required',
            "categories"=>"required",
           

            "synopsis" => 'required',

            /* image not required */
            "photo" => 'images|max:19999'
        ]);

        /*verification de l'import d'images*/
        if ($request->hasFile("images")) {
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension = $request->file('images')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('images')->storeAs('Animes/photos', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        /* Exportation des nouvelles donnée dans la base de donnée */
        $animes=animes::find($id);

        $animes->nom = $request->input('nom');
        $animes->date_diffusion = $request->input('date_diffusion');
        $animes->auteur = $request->input('auteur');
       

        $animes->synopsis = $request->input('synopsis');

        $animes->seasonals_id = $request->input('seasonals_id');
        $animes->images = $fileNameToStore;

        $animes->save();
        $animes->categories()->sync($request->input('categories'));
        return redirect()->route("LesAnimes")->with('success', 'Info mise a jours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animes = animes::find($id);
        $animes->delete();
        return redirect()->route("LesAnimes")->with('success', 'Animes supprimer');
    }
}
