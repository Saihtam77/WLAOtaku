<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog\evenements;
use Illuminate\Http\Request;

class EvenementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements=evenements::OrderBy("created_at","desc")->get();
        return view("pages.Blog.LesEvenements")->with("evenements",$evenements);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.Creation.nouveauxEvenements");
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
            $this->validate($request,[
            
                "nom"=>'required',
                "date_debut"=>'required',
                "date_fin"=>'required',
                "adresse"=>'required',
                "presentation"=>'required',
                "description"=>'required',
                /* image not required */
                "photo"=>'images|nullable|max:19999'
            ]);

        /*verification de l'import d'images*/
            if ($request->hasFile("images")) {
                $filenameWithExt=$request->file('images')->getClientOriginalName();
                /* recup le nom du fichier sans l'extension */
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                /* recup le l'extension du fichier */
                $extension=$request->file('images')->getClientOriginalExtension();
                /* stockage de l'image */
                $fileNameToStore=$filename.'_'.time().'.'.$extension;

                $path= $request->file('images')->storeAs('Evenements/photos',$fileNameToStore);
            }else{
                $fileNameToStore="noimage.jpg";
            }
        /* Exportation des nouvelles donnée dans la base de donnée */
            $evenements=new evenements;
            $evenements->nom=$request->input('nom');

            $evenements->date_debut=$request->input('date_debut');
            $evenements->date_fin=$request->input('date_fin');

            $evenements->adresse=$request->input('adresse');
            $evenements->presentation=$request->input('presentation');
            $evenements->description=$request->input('description');

            $evenements->images=$fileNameToStore;

            $evenements->save();
            return redirect()->route("dashboard")->with('success', 'Nouvel evenements ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evenement=evenements::find($id);
        return view("pages.Blog.Evenement")->with("evenement",$evenement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenement=evenements::find($id);
        return view ("pages.Edit.editEvenements")->with("evenement",$evenement);
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
        $this->validate($request,[
            
            "nom"=>'required',
            "date_debut"=>'required',
            "date_fin"=>'required',
            "adresse"=>'required',
            "presentation"=>'required',
            "description"=>'required',
            /* image not required */
            "images"=>'image|nullable|max:1999'
        ]);

        /*verification de l'import d'images*/
        if ($request->hasFile("images")) {
            $filenameWithExt=$request->file('images')->getClientOriginalName();
            /* recup le nom du fichier sans l'extension */
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            /* recup le l'extension du fichier */
            $extension=$request->file('images')->getClientOriginalExtension();
            /* stockage de l'image */
            $fileNameToStore=$filename.'_'.time().'.'.$extension;

            $path= $request->file('images')->storeAs('Evenements/photos',$fileNameToStore);
        }else{
            $fileNameToStore="noimage.jpg";
        }
        /* Exportation des nouvelles donnée dans la base de donnée */
        $evenements=evenements::find($id);
        
        $evenements->nom=$request->input('nom');

        $evenements->date_debut=$request->input('date_debut');
        $evenements->date_fin=$request->input('date_fin');
        $evenements->adresse=$request->input('adresse');

        $evenements->presentation=$request->input('presentation');
        $evenements->description=$request->input('description');

        $evenements->images=$fileNameToStore;

        $evenements->save();
        return redirect("dashboard")->with('success', 'Evenements mise a jours');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $evenement=evenements::find($id);
        $evenement->delete();
        return redirect()->route("accueil")->with('success', 'Evenements supprimer');
        
    }
}
