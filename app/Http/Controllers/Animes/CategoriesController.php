<?php

namespace App\Http\Controllers\Animes;

use App\Http\Controllers\Controller;
use App\Models\Animes\categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
        return view("pages.Creation.nouvellesCategories");
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
        ]);

        /* Exportation des nouvelles donnée dans la base de donnée */
        $categories=new categories;

        $categories->nom=$request->input('nom');

        $categories->save();
        return redirect()->route("dashboard")->with('success', 'Nouvelles categories ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=categories::find($id);
        return view("pages.Edit.editCategories")->with("categories",$categories);
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
        ]);

        /* Exportation des nouvelles donnée dans la base de donnée */
        $categorie= categories::find($id);
        
        $categorie->nom=$request->input('nom');

        $categorie->save();
        return redirect()->route("dashboard")->with('success', 'Catégories mise à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie=categories::find($id);
        $categorie->delete();
        return redirect()->route("LesSeasonals")->with('success', 'Catégories supprimée');
    }
}
