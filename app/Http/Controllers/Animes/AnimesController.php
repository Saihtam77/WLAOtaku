<?php

namespace App\Http\Controllers\Animes;

use App\Http\Controllers\Controller;
use App\Models\Animes\animes;
use App\Models\Animes\saisons;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

            "synopsis" => 'required',

            /* image not required */
            "images"=>'image|nullable|max:1999'
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
        $animes = new animes;

        $animes->nom = $request->input('nom');
        $animes->date_diffusion = $request->input('date_diffusion');
        $animes->auteur = $request->input('auteur');

        $animes->synopsis = $request->input('synopsis');

        $animes->seasonals_id = $request->input('seasonals_id');
        $animes->images = $fileNameToStore;

        $animes->save();
        return redirect()->route("LesSeasonals")->with('success', 'Nouvel anime ajouter');
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
        $saisons=saisons::OrderBy("created_at","desc")->where("animes_id","=",$id)->get();
        return view("pages.Animes.Anime",[
            "anime"=>$anime,
            "saisons"=>$saisons
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

            "synopsis" => 'required',

            /* image not required */
            "photo" => 'images|nullable|max:19999'
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
