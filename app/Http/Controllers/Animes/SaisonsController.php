<?php

namespace App\Http\Controllers\Animes;

use App\Http\Controllers\Controller;
use App\Models\Animes\episodes;
use App\Models\Animes\saisons;
use Illuminate\Http\Request;

class SaisonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $saisons = new saisons;

        $saisons->nom = $request->input('nom');
        $saisons->synopsis = $request->input('synopsis');

        $saisons->animes_id = $request->input('animes_id');
        $saisons->images= $fileNameToStore;

        $saisons->save();
        return redirect()->route("LesAnimes")->with('success', 'Nouvel saison ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $saison =saisons::find($id);
        $episodes=episodes::OrderBy("nom","desc")->where("saisons_id","=",$id)->get();
        return view("pages.Animes.LesEpisodes",[
            "saison"=>$saison,
            "episodes"=>$episodes,
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
        $saison=saisons::find($id);
        return view("pages.Edit.editSaisons")->with("saison",$saison);
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
        $saisons = saisons::find($id);

        $saisons->nom = $request->input('nom');
        $saisons->synopsis = $request->input('synopsis');

        $saisons->animes_id = $request->input('animes_id');
        $saisons->images= $fileNameToStore;

        $saisons->save();
        return redirect()->route("LesAnimes")->with('success', 'Saison mise a jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saisons = saisons::find($id);
        $saisons->delete();
        return redirect()->route("LesAnimes")->with('success', 'Saison supprimer');
    }
}
