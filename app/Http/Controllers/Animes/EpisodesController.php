<?php

namespace App\Http\Controllers\Animes;

use App\Http\Controllers\Controller;
use App\Models\Animes\episodes;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            /* image not required */
            "video"=>'required|mimes:mp4'
        ]);

        /*Import de la video dans les fichier de stockage*/
        if ($request->hasFile("video")) {
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension = $request->file('video')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('video')->storeAs('Animes/Episodes/video', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }
        
        /* Exportation des nouvelles donnée dans la base de donnée */
        $episodes = new episodes;

        $episodes->nom = $request->input('nom');
        $episodes->animes_id = $request->input('animes_id');


        $episodes->video = $fileNameToStore;

        $episodes->save();
        return redirect()->route("LesAnimes")->with('success', 'Nouvel episode ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $episode=episodes::find($id);//les infos relatives a l'episode
        $episodes=episodes::OrderBy("created_at")->where("saison_id","=",$id);//Les infos realtives a tout les episodes de la saison
        
        return view("pages.Animes.Episode",[
            "episode"=>$episode,
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
        $episode=episodes::find($id);
        return view("pages.Edit.editEpisode",[
            "episode"=>$episode
        ]);
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
            /* image not required */
            "video"=>'required|mimes:mp4',
        ]);

        /*verification de l'import d'images*/
        if ($request->hasFile("video")) {
            $filenameWithExt = $request->file('video')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension = $request->file('video')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $path = $request->file('video')->storeAs('Animes/Episodes/video', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        /* Exportation des nouvelles donnée dans la base de donnée */
        $episodes = episodes::find($id);

        $episodes->nom = $request->input('nom');

        $episodes->animes_id = $request->input('animes_id');

        $episodes->video = $fileNameToStore;

        $episodes->save();
        return redirect()->route("LesAnimes")->with('success', 'Episode modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = episodes::find($id);
        $episode->delete();
        return redirect()->route("LesAnimes")->with('success', 'Episode supprimer');
    }
}
